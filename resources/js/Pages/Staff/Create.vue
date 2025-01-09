<template>
    <div>
      <h1>Create Staff</h1>
      <form @submit.prevent="submit">
        <input v-model="form.name" placeholder="Name" />
        <input v-model="form.role" placeholder="Role" />
        <textarea v-model="form.schedule" placeholder="Schedule"></textarea>
        <input v-model="form.contact_information" placeholder="Contact Information" />
        <button type="submit">Submit</button>
      </form>
    </div>
  </template>
  
  <script setup>
  import { useForm } from '@inertiajs/vue3';
  
  const form = useForm({
    name: '',
    role: '',
    schedule: '',
    contact_information: '',
  });
  
  const submit = () => {
    form.post('/staff');
  };
  </script>