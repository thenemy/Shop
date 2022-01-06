<div x-data="initSum()"

     @credit-update.window="setPercent($event.detail.percent, $event.detail.month)"
     @product-update.window="setProducts($event.detail.sum)"
     @pay-update.window="setInitialPayment($event.data.value)"
     @product-number.window="setProductsWithNumber($event.detail.product)"
     class="flex flex-row border w-full justify-around">
    <div>
        <span class="font-bold">{{__("Процент за месяц:")}}</span> <span x-text="percent_month"></span>
    </div>
    <div>
        <span class="font-bold">{{__("Количество месяцев:")}}</span> <span x-text="number_month"> </span>
    </div>
    <div>
        <span class="font-bold">{{__("Общая сумма без процентов:")}}</span> <span x-text="sum_products_show"></span>
    </div>
    <div>
        <span class="font-bold">{{__("Денег за один месяц:")}}</span> <span x-text="sum_per_month"> </span>
    </div>
    <input class="hidden" type="text" name="{{\App\Domain\Order\Interfaces\UserPurchaseRelation::PRODUCTS_ENCODE}}"
           :value="product_json_decoded">
</div>
<script>
    function initSum() {
        return {
            sum_per_month: 0,
            percent_month: 0,
            number_month: 0,
            sum_products: 0,
            initial_payment: 0,
            sum_products_show: "0",
            product_json_decoded: "",
            setInitialPayment(pay) {
                this.initial_payment = pay;
                this.calculateSum();
            },
            setPercent(percent, month) {
                this.percent_month = percent
                this.number_month = month
                this.calculateSum();
            },
            setProducts(new_sum) {
                this.sum_products = new_sum;
                this.calculateSum();
            },
            addSpacing(value) {
                return value.split("").reverse().join("").replace(/(\d{3})/g, '$1 ').replace(/(^\s+|\s+$)/, '').split("").reverse().join("");
            },
            calculateSum() {
                let new_percent = this.percent_month / 100;
                let sum_percent = this.sum_products * new_percent
                this.sum_products_show = this.addSpacing(`${this.sum_products}`);
                let total = sum_percent + this.sum_products - this.initial_payment;
                if (this.number_month === 0) {
                    this.sum_per_month = 0;
                } else {
                    this.sum_per_month = this.addSpacing((total / this.number_month).toFixed(0).toString());
                }
            },
            setProductsWithNumber(product) {
                this.product_json_decoded = product;
            }
        }
    }
</script>
