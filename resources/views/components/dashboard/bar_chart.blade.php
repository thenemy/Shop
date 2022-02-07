<div class="basis-[65%] bg-white shadow-lg rounded-lg overflow-hidden">
    <div class="py-3 px-5 text-black_custom font-semibold">Статистика за 5 дней</div>
    <hr>
    <canvas class="p-10" id="chartBar"></canvas>
</div>

<!-- Required chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Chart bar -->
<script>
    const labelsBarChart = [
        '{{str_day_of_week(now()->subDays(4)->dayOfWeek )}}',
        '{{str_day_of_week(now()->subDays(3)->dayOfWeek )}}',
        '{{str_day_of_week(now()->subDays(2)->dayOfWeek )}}',
        '{{str_day_of_week(now()->subDay()->dayOfWeek )}}',
        '{{str_day_of_week(now()->dayOfWeek)}}',
    ];
    const dataBarChart = {
        labels: labelsBarChart,
        datasets: [
            {
                label: '{{__("Покупки")}}',
                backgroundColor: "hsl(252, 82.9%, 67.8%)",
                borderColor: "hsl(252, 82.9%, 67.8%)",
                data: [
                    0,
                    10,
                    5,
                    2,
                    20,
                ],
            },
            {
                label: '{{__("Рассрочки")}}',
                backgroundColor: "rgb(170, 255, 0)",
                borderColor: "rgb(150, 255, 0)",
                data: [
                    5,
                    1,
                    30,
                    2,
                    60
                ],
            },
            {
                label: '{{__("Отказы")}}',
                backgroundColor: "rgb(220,20,60)",
                data: [0, 10, 5, 2, 20, 30, 45],
            },
        ],
    };

    const configBarChart = {
        type: "bar",
        data: dataBarChart,
        options: {},
    };

    var chartBar = new Chart(
        document.getElementById("chartBar"),
        configBarChart
    );
</script>
