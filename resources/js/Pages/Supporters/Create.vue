<template>
    <div>
      <h1>Create Supporter</h1>
      <form @submit.prevent="submit">
        <input v-model="form.name" placeholder="Name" />
        <input v-model="form.age" placeholder="Age" />
        <input v-model="form.gender" placeholder="Gender" />
        <input v-model="form.address" placeholder="Address" />
        <input v-model="form.phone_number" placeholder="Phone Number" />
        <input v-model="form.email" placeholder="Email" />
        <input v-model="form.support_type" placeholder="Support Type" />
        <input v-model="form.contribution_amount" placeholder="Contribution Amount" />
        <input v-model="form.commit_duration" placeholder="Commit Duration" />
        <input v-model="form.start_date" type="date" />
        <textarea v-model="form.bank_details" placeholder="Bank Details"></textarea>
        <input v-model="form.visitation_preference" placeholder="Visitation Preference" />
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
    address: '',
    phone_number: '',
    email: '',
    support_type: '',
    contribution_amount: '',
    commit_duration: '',
    start_date: '',
    bank_details: '',
    visitation_preference: '',
  });
  
  const submit = () => {
    form.post('/supporters');
  };
  </script>