// resources/js/Components/ApexChart.js
import VueApexCharts from 'vue3-apexcharts'

export default {
  install(app) {
    app.component('ApexChart', VueApexCharts)
  }
}