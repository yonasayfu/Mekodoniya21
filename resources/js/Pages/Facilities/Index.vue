<template>
    <div>
      <h1>Facilities</h1>
      <ul>
        <li v-for="facility in facilities" :key="facility.id">
          {{ facility.name }} - {{ facility.location }}
          <Link :href="`/facilities/${facility.id}`">View</Link>
          <Link :href="`/facilities/${facility.id}/edit`">Edit</Link>
        </li>
      </ul>
      <Link href="/facilities/create">Create New Facility</Link>
    </div>
  </template>
  
  <script setup>
  import { Link } from '@inertiajs/vue3';
  
  defineProps({
    facilities: Array,
  });
  </script>