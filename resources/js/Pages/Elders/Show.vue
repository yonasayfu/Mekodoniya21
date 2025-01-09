<template>
    <div>
      <h1>{{ elder.name }}</h1>
      <p>Age: {{ elder.age }}</p>
      <p>Gender: {{ elder.gender }}</p>
      <p>Date of Birth: {{ elder.date_of_birth }}</p>
      <p>Address: {{ elder.address }}</p>
      <p>Phone Number: {{ elder.phone_number }}</p>
      <p>Email: {{ elder.email }}</p>
      <p>Background Story: {{ elder.background_story }}</p>
      <p>Current Needs: {{ elder.current_needs }}</p>
      <p>Medical History: {{ elder.medical_history }}</p>
      <p>Support Status: {{ elder.support_status }}</p>
      <Link :href="`/elders/${elder.id}/edit`">Edit</Link>
    </div>
  </template>
  
  <script setup>
  import { Link } from '@inertiajs/vue3';
  
  defineProps({
    elder: Object,
  });
  </script>