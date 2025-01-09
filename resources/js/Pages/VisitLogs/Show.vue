<template>
    <div>
      <h1>Visit Log Details</h1>
      <p>Elder: {{ visitLog.elder.name }}</p>
      <p>Supporter: {{ visitLog.supporter.name }}</p>
      <p>Visit Date: {{ visitLog.visit_date }}</p>
      <p>Visit Purpose: {{ visitLog.visit_purpose }}</p>
      <p>Notes: {{ visitLog.notes }}</p>
      <Link :href="`/visit-logs/${visitLog.id}/edit`">Edit</Link>
    </div>
  </template>
  
  <script setup>
  import { Link } from '@inertiajs/vue3';
  
  defineProps({
    visitLog: Object,
  });
  </script>