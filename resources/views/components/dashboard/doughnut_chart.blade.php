<div class="basis-[35%] bg-white shadow-lg rounded-lg overflow-hidden">
    <div class="py-3 px-5 text-black_custom font-semibold">Общая статистика рассрочек</div>
    <hr>
    <canvas width="360" height="320" class="p-10" id="chartDoughnut"></canvas>
</div>

<!-- Required chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Chart doughnut -->
<script>
    const datasets = [
        {
            label: "My First Dataset",
            data: [
                3,
                {{--                    {{\App\Domain\Installment\Entities\TakenCredit::where("status", \App\Domain\Installment\Interfaces\PurchaseStatus::FINISHED)->count()}},--}}
                    4,
                4,
                {{--                    {{\App\Domain\Installment\Entities\TakenCredit::where("status", \App\Domain\Installment\Interfaces\PurchaseStatus::WAIT_ANSWER)->count()}},--}}
                    {{--                    {{\App\Domain\Installment\Entities\TakenCredit::where("status", \App\Domain\Installment\Interfaces\PurchaseStatus::ACCEPTED)->count()}},--}}
                    2
                {{--                    {{\App\Domain\Installment\Entities\TakenCredit::where("status", \App\Domain\Installment\Interfaces\PurchaseStatus::DECLINED)->count()}},--}}
            ],
            backgroundColor: [
                "rgb(170, 255, 0)",
                "rgb(164, 101, 241)",
                "rgb(101, 143, 241)",
                "rgb(220,20,60)"
            ],
            hoverOffset: 4,
        },
    ];
    const dataDoughnut = {
        labels: [
            '{{__("Завершенные")}}',
            '{{__("Ожидаемые")}}',
            '{{__("Выплаты")}}',
            '{{__("Отказанные")}}'
        ],
        datasets: datasets,


    };

    const configDoughnut = {
        type: "doughnut",
        data: dataDoughnut,
        options: {
            onClick(e) {
                const activePoints = chartBar.getElementsAtEventForMode(e, 'nearest', {
                    intersect: true
                }, false)
                if (activePoints.length !== 0)
                    console.log(activePoints[0].index);
            },
        },
    };

    var chartBar = new Chart(
        document.getElementById("chartDoughnut"),
        configDoughnut,
    );

</script>
