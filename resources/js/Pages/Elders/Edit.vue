<template>
    <div>
      <h1>Edit Elder</h1>
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
  
  const props = defineProps({
    elder: Object,
  });
  
  const form = useForm({
    name: props.elder.name,
    age: props.elder.age,
    gender: props.elder.gender,
    date_of_birth: props.elder.date_of_birth,
    address: props.elder.address,
    phone_number: props.elder.phone_number,
    email: props.elder.email,
    background_story: props.elder.background_story,
    current_needs: props.elder.current_needs,
    medical_history: props.elder.medical_history,
    support_status: props.elder.support_status,
  });
  
  const submit = () => {
    form.put(`/elders/${props.elder.id}`);
  };
  </script>