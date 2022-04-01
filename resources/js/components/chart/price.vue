<template>
  <!-- avg will be added soon -->
  <!-- <div class="flex items-center justify-between mb-4">
    <div class="flex-shrink-0">
      <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">$45,385</span>
      <h3 class="text-base font-normal text-gray-500">Sales this week</h3>
    </div>
    <div class="flex items-center justify-end flex-1 text-green-500 text-base font-bold">
      12.5%
      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path
          fill-rule="evenodd"
          d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z"
          clip-rule="evenodd"
        ></path>
      </svg>
    </div>
  </div> -->
  <v-apexchart type="area" height="500" :options="chart.chartOptions" :series="chart.series" />
</template>
<script setup>
const props = defineProps({
  data: Object,
});

const chart = {
  series: [{ ...props.data, color: "#7e3af2" }],
  chartOptions: {
    chart: {
      zoom: {
        enabled: false,
      },
    },
    dataLabels: {
      enabled: false,
    },
    fill: {
      colors: ["#7e3af2"],
    },
    stroke: {
      curve: "straight",
    },
    title: {
      text: "Grafik Biaya Pembelian Barang",
      align: "left",
    },
    subtitle: {
      text: "Nominal dihitung berdasarkan bulan pada tahun berjalan.",
      align: "left",
    },
    labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agust", "Sep", "Okt", "Nov", "Des"],
    yaxis: {
      opposite: true,
      labels: {
        show: false,
        formatter: function (val) {
          return `Rp ${Intl.NumberFormat("id-ID").format(val)}`;
        },
      },
    },
    legend: {
      horizontalAlign: "left",
    },
  },
};
</script>
