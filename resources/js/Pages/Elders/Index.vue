<template>
    <div>
      <h1>Elders</h1>
      <ul>
        <li v-for="elder in elders" :key="elder.id">
          {{ elder.name }} - {{ elder.age }}
          <Link :href="`/elders/${elder.id}`">View</Link>
          <Link :href="`/elders/${elder.id}/edit`">Edit</Link>
        </li>
      </ul>
      <Link href="/elders/create">Create New Elder</Link>
    </div>
  </template>
  
  <script setup>
  import { Link } from '@inertiajs/vue3';
  
  defineProps({
    elders: Array,
  });
  </script>

  