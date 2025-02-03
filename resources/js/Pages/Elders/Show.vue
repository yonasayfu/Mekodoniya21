<template>
  <div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-6">Elder Details</h1>
    <div class="bg-white p-6 rounded-lg shadow-md">
      <!-- Carousel Slider -->
      <div class="mb-6 relative">
        <swiper
          :modules="[SwiperAutoplay, SwiperPagination, SwiperNavigation]"
          :slides-per-view="1"
          :space-between="10"
          :pagination="{ clickable: true }"
          :autoplay="{ delay: 3000, disableOnInteraction: true }"
          navigation
          class="w-96 h-72 md:h-96"
        >

        
        <swiper-slide v-for="photo in elder.photo_url.slice(0, 5)" :key="photo.id">
            <img :src="elder.photo_url" alt="Gallery Photo" class="w-full h-full object-cover rounded-lg">
          </swiper-slide>
        </swiper>
        <!-- Navigation Arrows -->
        
      </div>

      <!-- Elder Details -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
          <h2 class="text-lg font-semibold mb-2">Basic Information</h2>
          <p class="text-gray-600"><strong>Name:</strong> {{ elder.name }}</p>
          <p class="text-gray-600"><strong>Age:</strong> {{ elder.age }} years old</p>
          <p class="text-gray-600"><strong>Gender:</strong> {{ elder.gender }}</p>
          <p class="text-gray-600"><strong>Date of Birth:</strong> {{ elder.date_of_birth }}</p>
          <p class="text-gray-600"><strong>Address:</strong> {{ elder.address }}</p>
          <p class="text-gray-600"><strong>Phone Number:</strong> {{ elder.phone_number }}</p>
          <p class="text-gray-600"><strong>Email:</strong> {{ elder.email }}</p>
          <p class="text-gray-600"><strong>Support Status:</strong> {{ elder.support_status }}</p>
        </div>
        <div>
          <h2 class="text-lg font-semibold mb-2">Background Story</h2>
          <div class="bg-gray-100 p-4 rounded-lg">
            <p class="text-gray-600 whitespace-pre-line">{{ elder.background_story }}</p>
          </div>
        </div>
        <div>
          <h2 class="text-lg font-semibold mb-2">Current Needs</h2>
          <div class="bg-gray-100 p-4 rounded-lg">
          <p class="text-gray-600 whitespace-pre-line">{{ elder.current_needs }}</p>
          </div>
        </div>
        <div>
          <h2 class="text-lg font-semibold mb-2">Medical History</h2>
          <div class="bg-gray-100 p-4 rounded-lg">
            <p class="text-gray-600 whitespace-pre-line">{{ elder.medical_history }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { Swiper, SwiperSlide } from 'swiper/vue';
import { Autoplay as SwiperAutoplay, Pagination as SwiperPagination, Navigation as SwiperNavigation } from 'swiper/modules';
import 'swiper/swiper-bundle.css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

const props = defineProps({
  elder: Object,
});

// const limitedPhotos = computed(() => {
//   return props.elder.photos.slice(0, 5);
// });
</script>

<style scoped>
/* Add custom styles if needed */
</style>
