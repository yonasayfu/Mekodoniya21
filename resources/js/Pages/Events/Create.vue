<template>
  <div class="container mx-auto p-4">
    <!-- Success message -->
     
    <div v-if="showSuccess" class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
        Event registered successfully!
    </div>
     <!-- Error message -->
    <div v-if="showError" class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
      There was an error processing your request. Please check the form.
    </div>
    <div class="max-w-4xl mx-auto">
      <!-- Centered heading with larger text -->
      <h1 class="text-3xl font-bold mb-8 text-center">Register New Event</h1>

      <form @submit.prevent="submit" class="bg-white rounded-lg shadow-md p-6 space-y-6">
        <!-- First Row - Name & Category -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label class="block text-sm font-medium text-gray-700">Event Name</label>
            <input
              v-model="form.name"
              type="text"
              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
              required
            />
          </div>
           <div>
              <label class="block text-sm font-medium text-gray-700">Event Category</label>
              <select
                  v-model="form.category"
                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                  required
              >
                  <option value="" disabled>Select a category</option>
                  <option v-for="category in categories" :key="category" :value="category">{{ category }}</option>
              </select>
          </div>
        </div>
        <!-- Second Row - Date & Time -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label class="block text-sm font-medium text-gray-700">Date</label>
            <input
              v-model="form.date"
              type="date"
              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
              required
            />
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700">Start Time</label>
            <input
              v-model="form.start_time"
              type="time"
              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
              required
            />
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700">End Time</label>
            <input
              v-model="form.end_time"
              type="time"
              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
              required
            />
          </div>
        </div>
         <!-- Third Row - Location & Facility -->
         <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
           <div>
            <label class="block text-sm font-medium text-gray-700">Location</label>
            <input
              v-model="form.location"
              type="text"
              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
              required
            />
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700">Facility</label>
            <select
              v-model="form.facility_id"
              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
              required
            >
            <option value="" disabled>Select a facility</option>
              <option v-for="facility in facilities" :key="facility.id" :value="facility.id">
                {{ facility.name }}
              </option>
            </select>
          </div>
        </div>
         <!-- Fourth Row - Staff & Catering -->
         <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label class="block text-sm font-medium text-gray-700">Staff</label>
            <select
              v-model="form.staff_id"
              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
              required
            >
            <option value="" disabled>Select staff</option>
              <option v-for="staff in staff" :key="staff.id" :value="staff.id">
                {{ staff.name }}
              </option>
            </select>
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700">Catering</label>
            <select
              v-model="form.catering_id"
              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
              required
            >
              <option value="" disabled>Select catering</option>
              <option v-for="catering in caterings" :key="catering.id" :value="catering.id">
                {{ catering.name }}
              </option>
            </select>
          </div>
        </div>
        <!-- Custom Requirements -->
        <div>
          <label class="block text-sm font-medium text-gray-700">Custom Requirements</label>
          <textarea
            v-model="form.custom_requirements"
            rows="4"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
          ></textarea>
        </div>

        <!-- Centered buttons -->
        <div class="flex justify-center space-x-4">
          <Link
            href="/events"
            class="px-6 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 transition-colors"
          >
            Cancel
          </Link>
          <button
            type="submit"
            class="px-6 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors"
            :disabled="form.processing"
          >
            Register Event
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup>
import { Link, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';  // Import ref for toast visibility

const props = defineProps({
    facilities: Array,
    staff: Array,
    caterings: Array,
    categories: Array,
});

const form = useForm({
    name: '',
    category: '',
    date: '',
    start_time: '',
    end_time: '',
    location: '',
    facility_id: '',
    staff_id: '',
    catering_id: '',
    custom_requirements: ''
});
// Added state to handle visibility of messages
const showSuccess = ref(false);
const showError = ref(false);

const submit = () => {
  form.post(route('events.store'), {
    preserveScroll: true,
    onSuccess: () => {
      showSuccess.value = true;
        setTimeout(() => {
            showSuccess.value = false;
              form.reset()
        }, 7000);
     },
    onError: (errors) => {
      showError.value = true;
        setTimeout(() => {
         showError.value = false;
        }, 7000)
        console.log('Errors:', errors);
    }
    });
};
</script>
