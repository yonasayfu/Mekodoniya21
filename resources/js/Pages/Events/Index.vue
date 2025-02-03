<template>
  <div class="container mx-auto p-4">
      <div class="flex justify-between items-center mb-12">
          <h1 class="text-2xl font-bold">Events List</h1>
          <Link
              href="/events/create"
              class="bg-green-500 text-white py-2 px-6 rounded-md hover:bg-green-600 transition-colors duration-300 inline-block"
          >
              Register New Event
          </Link>
      </div>

      <!-- Category Filter Buttons -->
      <div class="mb-4 flex space-x-2 flex-wrap gap-2">
          <button
              @click="selectCategory(null)"
              :class="{
                  'bg-blue-500 text-white': selectedCategory === null,
                  'bg-gray-200 text-gray-700 hover:bg-gray-300': selectedCategory !== null,
                  'py-2 px-4 rounded-md transition-colors duration-300': true,
              }"
          >
              All Categories
          </button>
          <button
              v-for="category in categories"
              :key="category"
              @click="selectCategory(category)"
              :class="{
                  'bg-blue-500 text-white': selectedCategory === category,
                  'bg-gray-200 text-gray-700 hover:bg-gray-300': selectedCategory !== category,
                  'py-2 px-4 rounded-md transition-colors duration-300': true,
              }"
          >
              {{ category }}
          </button>
      </div>

      <!-- Events Count -->
      <div class="mb-4 text-gray-600">
          Showing {{ filteredEvents.length }} events
          {{ selectedCategory ? `in ${selectedCategory}` : 'across all categories' }}
      </div>

      <!-- Events Grid -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
          <div
              v-for="event in filteredEvents"
              :key="event.id"
              class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300"
          >
              <!-- Event Image -->
              <div class="h-48 overflow-hidden">
                  <img
                      :src="event.image_url"
                      :alt="event.name"
                      class="w-full h-full object-cover"
                  >
              </div>

              <div class="p-4">
                  <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ event.name }}</h2>
                  <div class="space-y-2">
                      <!-- Status Badge -->
                      <p class="text-gray-600">
                          <span class="font-medium">Status:</span> 
                          <span :class="getStatusClass(event.status)" class="px-2 py-1 rounded-full text-sm">
                              {{ formatStatus(event.status) }}
                          </span>
                      </p>
                      <p class="text-gray-600">
                          <span class="font-medium">Category:</span> 
                          <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">
                              {{ event.category }}
                          </span>
                      </p>
                      <p class="text-gray-600">
                          <span class="font-medium">Date:</span> {{ formatDate(event.date) }}
                      </p>
                      <p class="text-gray-600">
                          <span class="font-medium">Time:</span> 
                          {{ formatTime(event.start_time) }} - {{ formatTime(event.end_time) }}
                      </p>
                      <p class="text-gray-600">
                          <span class="font-medium">Location:</span> {{ event.location }}
                      </p>
                  </div>
                  <!-- <div class="mt-4 flex justify-end">
                      <Link
                          :href="`/events/${event.id}`"
                          class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition-colors duration-300"
                      >
                          View Details
                      </Link>
                  </div> -->
              </div>
          </div>
      </div>

      <!-- No Events Message -->
      <div v-if="filteredEvents.length === 0" class="text-center py-8">
          <p class="text-gray-500 text-lg">
              No events found {{ selectedCategory ? `in ${selectedCategory} category` : '' }}
          </p>
      </div>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import { ref, computed } from 'vue';

const props = defineProps({
  events: Array,
  availableCategories: Array,
});

const categories = computed(() => props.availableCategories);
const selectedCategory = ref(null);

const filteredEvents = computed(() => {
  if (!selectedCategory.value) {
      return props.events;
  }
  return props.events.filter((event) => event.category === selectedCategory.value);
});

function selectCategory(category) {
  selectedCategory.value = category;
}

function formatDate(date) {
  return new Date(date).toLocaleDateString('en-US', {
      year: 'numeric',
      month: 'long',
      day: 'numeric'
  });
}

function formatTime(time) {
  return new Date(`2000-01-01T${time}`).toLocaleTimeString('en-US', {
      hour: '2-digit',
      minute: '2-digit'
  });
}

function formatStatus(status) {
  return status.split('_').map(word => 
      word.charAt(0).toUpperCase() + word.slice(1)
  ).join(' ');
}

function getStatusClass(status) {
  const classes = {
      upcoming: 'bg-yellow-100 text-yellow-800',
      in_progress: 'bg-blue-100 text-blue-800',
      done: 'bg-green-100 text-green-800',
      cancelled: 'bg-red-100 text-red-800'
  };
  return classes[status] || 'bg-gray-100 text-gray-800';
}
</script>