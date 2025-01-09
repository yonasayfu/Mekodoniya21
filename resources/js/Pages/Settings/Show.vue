<template>
    <div>
      <h1>Setting Details</h1>
      <p>Key: {{ setting.key }}</p>
      <p>Value: {{ setting.value }}</p>
      <p>Description: {{ setting.description }}</p>
      <Link :href="`/settings/${setting.id}/edit`">Edit</Link>
    </div>
  </template>
  
  <script setup>
  import { Link } from '@inertiajs/vue3';
  
  defineProps({
    setting: Object,
  });
  </script>