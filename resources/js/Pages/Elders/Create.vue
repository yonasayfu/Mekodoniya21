<template>
    <div>
      <h1>Create Elder</h1>
      <form @submit.prevent="submit">
        <input v-model="form.name" placeholder="Name" />
        <input v-model="form.age" placeholder="Age" />
        <input v-model="form.gender" placeholder="Gender" />
        <input v-model="form.date_of_birth" type="date" />
        <input v-model="form.address" placeholder="Address" />
        <input v-model="form.phone_number" placeholder="Phone Number" />
        <input v-model="form.email" placeholder="Email" />
        <textarea v-model="form.background_story" placeholder="Background Story"></textarea>
        <textarea v-model="form.current_needs" placeholder="Current Needs"></textarea>
        <textarea v-model="form.medical_history" placeholder="Medical History"></textarea>
        <input v-model="form.support_status" placeholder="Support Status" />
        <button type="submit">Submit</button>
      </form>
    </div>
  </template>
  
  <script setup>
  import { useForm } from '@inertiajs/vue3';
  
  const form = useForm({
    name: '',
    age: '',
    gender: '',
    date_of_birth: '',
    address: '',
    phone_number: '',
    email: '',
    background_story: '',
    current_needs: '',
    medical_history: '',
    support_status: '',
  });
  
  const submit = () => {
    form.post('/elders');
  };
  </script>