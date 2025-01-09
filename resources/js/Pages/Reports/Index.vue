<template>
    <div>
      <h1>Reports</h1>
      <ul>
        <li v-for="report in reports" :key="report.id">
          {{ report.report_type }} - {{ report.generated_at }}
          <Link :href="`/reports/${report.id}`">View</Link>
          <Link :href="`/reports/${report.id}/edit`">Edit</Link>
        </li>
      </ul>
      <Link href="/reports/create">Create New Report</Link>
    </div>
  </template>
  
  <script setup>
  import { Link } from '@inertiajs/vue3';
  
  defineProps({
    reports: Array,
  });
  </script>