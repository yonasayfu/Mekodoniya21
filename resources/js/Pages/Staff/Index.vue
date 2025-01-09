<template>
    <div>
      <h1>Staff</h1>
      <ul>
        <li v-for="staff in staff" :key="staff.id">
          {{ staff.name }} - {{ staff.role }}
          <Link :href="`/staff/${staff.id}`">View</Link>
          <Link :href="`/staff/${staff.id}/edit`">Edit</Link>
        </li>
      </ul>
      <Link href="/staff/create">Create New Staff</Link>
    </div>
  </template>
  
  <script setup>
  import { Link } from '@inertiajs/vue3';
  
  defineProps({
    staff: Array,
  });
  </script>