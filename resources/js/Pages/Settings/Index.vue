<template>
    <div>
      <h1>Settings</h1>
      <ul>
        <li v-for="setting in settings" :key="setting.id">
          {{ setting.key }} - {{ setting.value }}
          <Link :href="`/settings/${setting.id}`">View</Link>
          <Link :href="`/settings/${setting.id}/edit`">Edit</Link>
        </li>
      </ul>
      <Link href="/settings/create">Create New Setting</Link>
    </div>
  </template>
  
  <script setup>
  import { Link } from '@inertiajs/vue3';
  
  defineProps({
    settings: Array,
  });
  </script>