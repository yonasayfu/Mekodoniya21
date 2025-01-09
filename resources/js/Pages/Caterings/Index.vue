<template>
    <div>
      <h1>Caterings</h1>
      <ul>
        <li v-for="catering in caterings" :key="catering.id">
          {{ catering.name }} - {{ catering.price }}
          <Link :href="`/caterings/${catering.id}`">View</Link>
          <Link :href="`/caterings/${catering.id}/edit`">Edit</Link>
        </li>
      </ul>
      <Link href="/caterings/create">Create New Catering</Link>
    </div>
  </template>
  
  <script setup>
  import { Link } from '@inertiajs/vue3';
  
  defineProps({
    caterings: Array,
  });
  </script>