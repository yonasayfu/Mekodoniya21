<template>
    <div>
      <h1>Elder Supporter Matches</h1>
      <ul>
        <li v-for="match in matches" :key="match.id">
          {{ match.elder.name }} - {{ match.supporter.name }}
          <Link :href="`/elder-supporter-matches/${match.id}`">View</Link>
          <Link :href="`/elder-supporter-matches/${match.id}/edit`">Edit</Link>
        </li>
      </ul>
      <Link href="/elder-supporter-matches/create">Create New Match</Link>
    </div>
  </template>
  
  <script setup>
  import { Link } from '@inertiajs/vue3';
  
  defineProps({
    matches: Array,
  });
  </script>