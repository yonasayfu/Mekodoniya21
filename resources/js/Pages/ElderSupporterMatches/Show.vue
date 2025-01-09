<template>
    <div>
      <h1>Match Details</h1>
      <p>Elder: {{ match.elder.name }}</p>
      <p>Supporter: {{ match.supporter.name }}</p>
      <p>Match Date: {{ match.match_date }}</p>
      <p>Monthly Contribution Amount: {{ match.monthly_contribution_amount }}</p>
      <p>Support Status: {{ match.support_status }}</p>
      <Link :href="`/elder-supporter-matches/${match.id}/edit`">Edit</Link>
    </div>
  </template>
  
  <script setup>
  import { Link } from '@inertiajs/vue3';
  
  defineProps({
    match: Object,
  });
  </script>