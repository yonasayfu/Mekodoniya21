<template>
    <div>
      <h1>Supporters</h1>
      <ul>
        <li v-for="supporter in supporters" :key="supporter.id">
          {{ supporter.name }} - {{ supporter.email }}
          <Link :href="`/supporters/${supporter.id}`">View</Link>
          <Link :href="`/supporters/${supporter.id}/edit`">Edit</Link>
        </li>
      </ul>
      <Link href="/supporters/create">Create New Supporter</Link>
    </div>
  </template>
  
  <script setup>
  import { Link } from '@inertiajs/vue3';
  
  defineProps({
    supporters: Array,
  });
  </script>