<template>
    <div>
      <h1>Facility Details</h1>
      <p>Name: {{ facility.name }}</p>
      <p>Location: {{ facility.location }}</p>
      <p>Capacity: {{ facility.capacity }}</p>
      <p>Availability: {{ facility.availability ? 'Available' : 'Unavailable' }}</p>
      <Link :href="`/facilities/${facility.id}/edit`">Edit</Link>
    </div>
  </template>
  
  <script setup>
  import { Link } from '@inertiajs/vue3';
  
  defineProps({
    facility: Object,
  });
  </script>