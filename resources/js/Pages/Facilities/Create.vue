<template>
    <div>
      <h1>Create Facility</h1>
      <form @submit.prevent="submit">
        <input v-model="form.name" placeholder="Name" />
        <input v-model="form.location" placeholder="Location" />
        <input v-model="form.capacity" placeholder="Capacity" />
        <input v-model="form.availability" type="checkbox" />
        <button type="submit">Submit</button>
      </form>
    </div>
  </template>
  
  <script setup>
  import { useForm } from '@inertiajs/vue3';
  
  const form = useForm({
    name: '',
    location: '',
    capacity: '',
    availability: false,
  });
  
  const submit = () => {
    form.post('/facilities');
  };
  </script>