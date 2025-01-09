<template>
    <div>
      <h1>Create Catering</h1>
      <form @submit.prevent="submit">
        <input v-model="form.name" placeholder="Name" />
        <textarea v-model="form.menu" placeholder="Menu"></textarea>
        <input v-model="form.price" placeholder="Price" />
        <button type="submit">Submit</button>
      </form>
    </div>
  </template>
  
  <script setup>
  import { useForm } from '@inertiajs/vue3';
  
  const form = useForm({
    name: '',
    menu: '',
    price: '',
  });
  
  const submit = () => {
    form.post('/caterings');
  };
  </script>