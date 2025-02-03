<template>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
      <div class="w-full" v-for="(total, key) in totals" :key="key">
        <div class="flex flex-col items-center">
          <div class="relative">
            <div
              class="rounded-full w-40 h-40 sm:w-52 sm:h-52 flex items-center justify-center font-bold transition duration-300 ease-in-out hover:scale-110 shadow-xl"
              :style="{
                background: `conic-gradient(from 0deg at 50% 50%, ${colors[key]} ${progress[key]}%, grey ${progress[key]}%)`,
                color: textColor(colors[key])
              }"
            >
              <span :class="[!total ? 'text-gray-700' : '']" class="text-2xl sm:text-3xl md:text-4xl lg:text-2xl pl-8">{{ formatNumber(total) }}</span>
              <span class="absolute top-1/2 -left-2 sm:-left-3 md:left-5 -translate-y-1/2 text-2xl sm:text-3xl md:text-4xl lg:text-2xl">$</span>
            </div>
          </div>
          <div class="mt-4 text-center text-lg font-semibold">
            {{ key.replace(/([A-Z])/g, ' $1') }} Total
            <div class="mt-2 text-sm text-gray-600 flex flex-col items-center">
              <div class="bg-green-200 rounded px-2 py-1 mt-1 flex items-center shadow-sm">
                <i class="fas fa-bullseye mr-1"></i> Expected: ${{ formatNumber(expectedTotals[key]) }}
              </div>
              <div :class="[remainingTotals[key] < 0 ? 'bg-red-200' : 'bg-green-200']" class="rounded px-2 py-1 mt-1 flex items-center shadow-sm">
                <!-- <i class="fas fa-chart-line mr-1"></i> Remaining: ${{ formatNumber(remainingTotals[key]) }}
                <div v-if="showArrow(remainingTotals[key])" :class="['triangle', remainingTotals[key] < 0 ? 'down red' : 'up green']"></div> -->
                <i class="fas fa-chart-line mr-1"></i> {{ remainingTotals[key] >= 0 ? 'Extra Amount' : 'Remaining' }}: ${{ formatNumber(remainingTotals[key]) }}
<div v-if="showArrow(remainingTotals[key])" :class="['triangle', remainingTotals[key] < 0 ? 'down red' : 'up green']"></div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import { reactive, onMounted, watch, computed } from 'vue';
  
  export default {
    props: {
      monthlyTotal: [Number, String],
      quarterlyTotal: [Number, String],
      halfYearlyTotal: [Number, String],
      yearlyTotal: [Number, String],
      year: Number,
      month: Number,
    },
    methods: {
      formatNumber(number) {
        if (typeof number === 'number') {
          return new Intl.NumberFormat('en-US').format(number);
        }
        return number;
      },
      textColor(bgColor) {
        const colorValue = bgColor.replace(/[^\d,]/g, "");
        const [r, g, b] = colorValue.split(',').map(Number);
        const luminance = 0.299 * r + 0.587 * g + 0.114 * b;
        return luminance > 150 ? 'black' : 'white';
      },
      showArrow(value) {
        return value !== 0;
      }
    },
    setup(props) {
      const totals = reactive({
        monthly: Number(props.monthlyTotal) || 0,
        quarterly: Number(props.quarterlyTotal) || 0,
        halfYearly: Number(props.halfYearlyTotal) || 0,
        yearly: Number(props.yearlyTotal) || 0,
      });
  
      const colors = reactive({
        monthly: '#007bff',
        quarterly: '#28a745',
        halfYearly: '#ffc107',
        yearly: '#dc3545',
      });
  
      const progress = reactive({
        monthly: 0,
        quarterly: 0,
        halfYearly: 0,
        yearly: 0,
      });
  
      const expectedTotals = reactive({
        monthly: 19550000, // **REPLACE WITH YOUR ACTUAL VALUES**
        quarterly: 3000, // **REPLACE WITH YOUR ACTUAL VALUES**
        halfYearly: 60000000, // **REPLACE WITH YOUR ACTUAL VALUES**
        yearly: 67000, // **REPLACE WITH YOUR ACTUAL VALUES**
      });
  
      const remainingTotals = computed(() => {
        const remaining = {};
        for (const key in totals) {
          remaining[key] = totals[key] - expectedTotals[key];
        }
        return remaining;
      });
  
      onMounted(() => {
        calculateProgress();
      });
  
      watch(props, () => {
        totals.monthly = Number(props.monthlyTotal) || 0;
        totals.quarterly = Number(props.quarterlyTotal) || 0;
        totals.halfYearly = Number(props.halfYearlyTotal) || 0;
        totals.yearly = Number(props.yearlyTotal) || 0;
  
        calculateProgress();
      });
  
      const calculateProgress = () => {
        for (const key in totals) {
          const value = totals[key];
          if (typeof value === 'number' && !isNaN(value) && expectedTotals[key] > 0) {
            progress[key] = (value / expectedTotals[key]) * 100;
          } else {
            progress[key] = 0;
          }
        }
      };
  
      return {
        totals,
        progress,
        colors,
        expectedTotals,
        remainingTotals,
      };
    },
  };
  </script>
  
  <style scoped>
  .triangle {
    width: 0;
    height: 0;
    border-left: 5px solid transparent;
    border-right: 5px solid transparent;
    margin-left: 5px;
  }
  
  .triangle.up {
    border-bottom: 5px solid;
  }
  
  .triangle.down {
    border-top: 5px solid;
  }
  
  .triangle.green {
    border-bottom-color: #4ade80;
    border-top-color: #4ade80;
  }
  
  .triangle.red {
    border-bottom-color: #f87171;
    border-top-color: #f87171;
  }
  
  .shadow-xl {
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -4px rgba(0, 0, 0, 0.1);
  }
  
  .shadow-sm {
    box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
  }
  
  .text-gray-700 {
    color: #4a5568;
  }
  </style>
  