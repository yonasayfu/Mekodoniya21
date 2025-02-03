<template>
  <div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-6 text-center text-blue-600">Our Valued Supporters</h1>
    <div class="mb-8 text-center">
      <h2 class="text-2xl font-semibold text-gray-700">Rank Criteria</h2>
      <canvas id="rankChart" class="mx-auto"></canvas>
    </div>
    <div v-if="supporters.length > 0" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
      <div
        v-for="supporter in paginatedSupporters"
        :key="supporter.id"
        class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 w-full h-auto"
      >
        <div class="p-6 flex flex-col items-center">
          <img :src="supporter.photo_url || 'default-photo-url.jpg'" alt="Supporter Photo" class="w-16 h-16 rounded-full mb-4">
          <h2 class="text-xl font-semibold text-gray-800">{{ supporter.name }}</h2>
          <p class="text-sm text-gray-600 mb-2">
            Supporting:
            <span v-for="(elder, index) in supporter.elders" :key="index" class="inline-block mr-1">
                <img :src="elder.photo" alt="Elder Photo" class="w-8 h-8 rounded-full inline-block mr-1">
            </span>
          </p>
          <p class="text-sm text-gray-600 italic mt-2" v-if="supporter.testimonial">
            "{{ supporter.testimonial }}"
          </p>
          <p class="text-sm text-gray-500 mt-2">
            Contribution: <span class="font-medium">{{ supporter.contribution }}</span>
          </p>
          <p :class="getRankClass(supporter.contribution)" class="text-sm font-medium mt-2">
            Rank: {{ getRank(supporter.contribution) }}
          </p>
          <p class="text-sm text-gray-500 mt-2">
            Supporter Type: <span class="font-medium">{{ supporter.support_type }}</span>
          </p>
          <p class="text-sm text-gray-500 mt-2">
            Visitations Reference: <span class="font-medium">{{ supporter.visitations_reference }}</span>
          </p>
        </div>
      </div>
    </div>
    <div v-else>
      <p class="text-center text-gray-500">No supporters found.</p>
    </div>
    <div class="mt-6 text-center">
      <!-- Pagination controls -->
      <button @click="prevPage" :disabled="currentPage === 1" class="px-4 py-2 bg-gray-300 rounded-md mr-2">Previous</button>
      <button @click="nextPage" :disabled="currentPage === totalPages" class="px-4 py-2 bg-gray-300 rounded-md">Next</button>
    </div>
  </div>
</template>

<script setup>
import { computed, ref, onMounted } from 'vue';
import { Chart, registerables } from 'chart.js';
Chart.register(...registerables);

const props = defineProps({
  supporters: {
    type: Array,
    required: true,
    default: () => [],
  },
});

const currentPage = ref(1);
const itemsPerPage = 8;
const totalPages = computed(() => Math.ceil(props.supporters.length / itemsPerPage));

const paginatedSupporters = computed(() => {
  const start = (currentPage.value - 1) * itemsPerPage;
  const end = start + itemsPerPage;
  return props.supporters.slice(start, end);
});

const prevPage = () => {
  if (currentPage.value > 1) currentPage.value--;
};

const nextPage = () => {
  if (currentPage.value < totalPages.value) currentPage.value++;
};

onMounted(() => {
  console.log('Supporters:', props.supporters);
  const ctx = document.getElementById('rankChart').getContext('2d');
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Platinum', 'Gold', 'Normal'],
      datasets: [{
        label: 'Contribution Range',
        data: [1000, 500, 499],
        backgroundColor: ['#4caf50', '#ffeb3b', '#f44336'],
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
});

const getRank = computed(() => (contribution) => {
  if (contribution >= 1000) return "Platinum";
  if (contribution >= 500) return "Gold";
  return "Normal";
});

const getRankClass = (contribution) => {
  if (contribution >= 1000) return 'text-green-500';
  if (contribution >= 500) return 'text-yellow-500';
  return 'text-red-500';
};
</script>