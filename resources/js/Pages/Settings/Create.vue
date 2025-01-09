<template>
    <div>
      <h1>Create Setting</h1>
      <form @submit.prevent="submit">
        <input v-model="form.key" placeholder="Key" />
        <input v-model="form.value" placeholder="Value" />
        <textarea v-model="form.description" placeholder="Description"></textarea>
        <button type="submit">Submit</button>
      </form>
    </div>
  </template>
  
  <script setup>
  import { useForm } from '@inertiajs/vue3';
  
  const form = useForm({
    key: '',
    value: '',
    description: '',
  });
  
  const submit = () => {
    form.post('/settings');
  };
  </script>