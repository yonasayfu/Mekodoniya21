<template>
    <div>
      <h1>Staff Details</h1>
      <p>Name: {{ staff.name }}</p>
      <p>Role: {{ staff.role }}</p>
      <p>Schedule: {{ staff.schedule }}</p>
      <p>Contact Information: {{ staff.contact_information }}</p>
      <Link :href="`/staff/${staff.id}/edit`">Edit</Link>
    </div>
  </template>
  
  <script setup>
  import { Link } from '@inertiajs/vue3';
  
  defineProps({
    staff: Object,
  });
  </script>