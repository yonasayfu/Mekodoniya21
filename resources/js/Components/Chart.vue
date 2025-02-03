<template>
    <apexchart 
      :options="options" 
      :series="series" 
      :type="type"
      :height="height"
    ></apexchart>
  </template>
  
  <script setup>
  defineProps({
    options: Object,
    series: Array,
    type: {
      type: String,
      default: 'line'
    },
    height: {
      type: [String, Number],
      default: '100%'
    }
  });
  // resources/js/Components/Chart.js
import VueApexCharts from 'vue-apexcharts';

const plugin = {
  install(app) {
    app.component('ApexChart', VueApexCharts);
  }
};

export { plugin };
  </script>