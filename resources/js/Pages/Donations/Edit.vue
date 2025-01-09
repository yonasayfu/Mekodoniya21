<template>
    <div>
      <h1>Edit Donation</h1>
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
    donation: Object,
    supporters: Array,
  });
  
  const form = useForm({
    supporter_id: props.donation.supporter_id,
    amount: props.donation.amount,
    date: props.donation.date,
    payment_method: props.donation.payment_method,
    donation_type: props.donation.donation_type,
  });
  
  const submit = () => {
    form.put(`/donations/${props.donation.id}`);
  };
  </script>