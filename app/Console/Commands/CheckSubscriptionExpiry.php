<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Subscription;
use App\Services\LogTracker;
use Illuminate\Console\Command;
use App\Models\SubscriptionBill;
use Illuminate\Support\Facades\DB;

class CheckSubscriptionExpiry extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscription:check-expiry';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check user subscription expiry';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        DB::beginTransaction();
        try {
            $merchants = DB::table('merchants')
                ->join('subscriptions', 'merchants.id', '=', 'subscriptions.merchant_id')
                ->join('plans', 'subscriptions.plan_id', '=', 'plans.id')
                ->where('plans.type', '!=', 'free')
                ->where('merchants.owner_id', null)
                ->where('subscriptions.end_date', '<', Carbon::now()->format('Y-m-d'))
                ->select(
                    'merchants.id',
                    'merchants.name',
                    'merchants.owner_id',
                    'merchants.status',
                    'subscriptions.id as subscription_id',
                    'subscriptions.plan_id',
                    'subscriptions.merchant_id',
                    'subscriptions.start_date',
                    'subscriptions.end_date',
                    'subscriptions.renewed_date',
                    'plans.type',
                    'plans.price',
                )
                ->get();



            foreach ($merchants as $item) {
                // Subscription Bill Generate
                $subscription_bill = new SubscriptionBill();
                $subscription_bill->merchant_id = $item->id;
                $subscription_bill->subscription_id = $item->subscription_id;
                $subscription_bill->due_date = Carbon::now();
                $subscription_bill->invoice_no = 123;
                $subscription_bill->amount = $item->price;
                $subscription_bill->status = 'unpaid';
                $subscription_bill->save();
                //update invoice 
                $subscription_bill->invoice_no = 'MITINV-' . rand(11, 99) . $subscription_bill->id . rand(11, 99);
                $subscription_bill->save();
                // Subscription inactive = 
                $subscription = Subscription::where('merchant_id', $item->id)->first();
                $subscription->status = 'inactive';
                $subscription->save();
            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            LogTracker::failLog($th, null);
        }
    }
}
