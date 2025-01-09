<template>
    <div>
      <h1>Create Donation</h1>
      <form @submit.prevent="submit">
        <select v-model="form.supporter_id">
          <option v-for="supporter in supporters" :key="supporter.id" :value="supporter.id">{{ supporter.name }}</option>
        </select>
        <input v-model="form.amount" placeholder="Amount" />
        <input v-model="form.date" type="date" />
        <input v-model="form.payment_method" placeholder="Payment Method" />
        <input v-model="form.donation_type" placeholder="Donation Type" />
        <button type="submit">Submit</button>
      </form>
    </div>
  </template>
  
  <script setup>
  import { useForm } from '@inertiajs/vue3';
  
  const props = defineProps({
    supporters: Array,
  });
  
  const form = useForm({
    supporter_id: '',
    amount: '',
    date: '',
    payment_method: '',
    donation_type: '',
  });
  
  const submit = () => {
    form.post('/donations');
  };
  </script>