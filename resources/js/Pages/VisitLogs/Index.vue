<template>
    <div>
      <h1>Visit Logs</h1>
      <ul>
        <li v-for="visitLog in visitLogs" :key="visitLog.id">
          {{ visitLog.elder.name }} - {{ visitLog.supporter.name }}
          <Link :href="`/visit-logs/${visitLog.id}`">View</Link>
          <Link :href="`/visit-logs/${visitLog.id}/edit`">Edit</Link>
        </li>
      </ul>
      <Link href="/visit-logs/create">Create New Visit Log</Link>
    </div>
  </template>
  
  <script setup>
  import { Link } from '@inertiajs/vue3';
  
  defineProps({
    visitLogs: Array,
  });
  </script>