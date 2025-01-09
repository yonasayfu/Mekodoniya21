<template>
    <div>
      <h1>Create Donation Agreement</h1>
      <form @submit.prevent="submit">
        <select v-model="form.supporter_id">
          <option v-for="supporter in supporters" :key="supporter.id" :value="supporter.id">{{ supporter.name }}</option>
        </select>
        <input v-model="form.full_name" placeholder="Full Name" />
        <input v-model="form.email_address" placeholder="Email Address" />
        <input v-model="form.phone_number" placeholder="Phone Number" />
        <input v-model="form.monthly_donation_amount" placeholder="Monthly Donation Amount" />
        <input v-model="form.bank_name" placeholder="Bank Name" />
        <input v-model="form.account_number" placeholder="Account Number" />
        <input v-model="form.preferred_start_date" type="date" />
        <textarea v-model="form.agreement_text" placeholder="Agreement Text"></textarea>
        <input v-model="form.pdf_file" placeholder="PDF File (optional)" />
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
    full_name: '',
    email_address: '',
    phone_number: '',
    monthly_donation_amount: '',
    bank_name: '',
    account_number: '',
    preferred_start_date: '',
    agreement_text: '',
    pdf_file: '',
  });
  
  const submit = () => {
    form.post('/donation-agreements');
  };
  </script>