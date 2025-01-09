<template>
    <div>
      <h1>{{ supporter.name }}</h1>
      <p>Age: {{ supporter.age }}</p>
      <p>Gender: {{ supporter.gender }}</p>
      <p>Address: {{ supporter.address }}</p>
      <p>Phone Number: {{ supporter.phone_number }}</p>
      <p>Email: {{ supporter.email }}</p>
      <p>Support Type: {{ supporter.support_type }}</p>
      <p>Contribution Amount: {{ supporter.contribution_amount }}</p>
      <p>Commit Duration: {{ supporter.commit_duration }}</p>
      <p>Start Date: {{ supporter.start_date }}</p>
      <p>Bank Details: {{ supporter.bank_details }}</p>
      <p>Visitation Preference: {{ supporter.visitation_preference }}</p>
      <Link :href="`/supporters/${supporter.id}/edit`">Edit</Link>
    </div>
  </template>
  
  <script setup>
  import { Link } from '@inertiajs/vue3';
  
  defineProps({
    supporter: Object,
  });
  </script>