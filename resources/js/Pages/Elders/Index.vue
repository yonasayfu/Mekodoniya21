
<template>
  <div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-6">Elders List</h1>

    <!-- Filter Section -->
    <div class="mb-6 p-4 bg-gray-50 rounded-lg shadow-sm">
      <h2 class="text-lg font-semibold mb-4">Filters</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Age Filter -->
        <div>
          <label class="block text-sm font-medium text-gray-700">Minimum Age</label>
          <input
            v-model="filters.age"
            type="number"
            min="0"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-400 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
          />
        </div>

        <!-- Gender Filter -->
        <div>
          <label class="block text-sm font-medium text-gray-700">Gender</label>
          <select
            v-model="filters.gender"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-400 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
          >
            <option value="">All</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>
        </div>

        <!-- Support Status Filter -->
        <div>
          <label class="block text-sm font-medium text-gray-700">Support Status</label>
          <select
            v-model="filters.support_status"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-400 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
          >
            <option value="">All</option>
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
          </select>
        </div>

        <!-- Current Needs Filter -->
        <div>
          <label class="block text-sm font-medium text-gray-700">Current Needs</label>
          <input
            v-model="filters.current_needs"
            type="text"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-400 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
          />
        </div>
      </div>

      <!-- Apply Filters Button -->
      <div class="mt-4">
        <button
          @click="applyFilters"
          class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition-colors duration-300"
        >
          Apply Filters
        </button>
      </div>
    </div>

    <!-- Elders List -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <div v-for="elder in elders" :key="elder.id" class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
        <div class="p-4">
          <div class="flex items-center space-x-4">
            <!-- Elder Photo (Circular) -->
            <div class="flex-shrink-0">
              <img :src="elder.photo_url" alt="Elder Photo" class="w-16 h-16 rounded-full object-cover border-2 border-blue-400">
            </div>
            <!-- Elder Details -->
            <div>
              <h2 class="text-lg font-semibold text-gray-800">{{ elder.name }}</h2>
              <p class="text-sm text-gray-600">{{ elder.age }} years old</p>
              <p class="text-sm text-gray-600">{{ elder.address }}</p>
            </div>
          </div>
          <!-- Actions -->
          <div class="mt-4 flex justify-end">
            <Link :href="`/elders/${elder.id}`" class="bg-blue-400 text-white py-1 px-3 rounded-full hover:bg-blue-500 text-sm transition-colors duration-300">
              View Details
            </Link>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { Link, router } from '@inertiajs/vue3';
import { ref, watch } from 'vue';

// Define props
const props = defineProps({
  elders: Array,
  filters: Object,
});

// Local state for filters
const filters = ref({
  age: props.filters.age || '',
  gender: props.filters.gender || '',
  support_status: props.filters.support_status || '',
  current_needs: props.filters.current_needs || '',
});

// Apply filters
const applyFilters = () => {
  router.get('/elders', filters.value, {
    preserveState: true,
    replace: true,
  });
};

// Watch for filter changes and apply them automatically (optional)
watch(filters, () => {
  applyFilters();
}, { deep: true });
</script>

<style scoped>
/* Add custom styles if needed */
</style>