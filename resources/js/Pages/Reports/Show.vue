<template>
    <div>
      <h1>Report Details</h1>
      <p>Report Type: {{ report.report_type }}</p>
      <p>Data: {{ report.data }}</p>
      <p>Generated At: {{ report.generated_at }}</p>
      <Link :href="`/reports/${report.id}/edit`">Edit</Link>
    </div>
  </template>
  
  <script setup>
  import { Link } from '@inertiajs/vue3';
  
  defineProps({
    report: Object,
  });
  </script>