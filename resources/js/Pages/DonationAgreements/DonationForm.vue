<template>
    <div class="max-w-7xl mx-auto p-8 bg-white rounded-lg shadow-lg">
      <div class="text-center mb-8">
        <h2 class="text-4xl font-bold text-gray-800 mb-2">Become a Supporter</h2>
        <p class="text-lg text-gray-600">Join us in making a difference in the lives of our elderly community members</p>
      </div>
  
      <form @submit.prevent="submitForm">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
          <div>
            <h3 class="text-2xl font-bold text-gray-800 mb-4">Personal Information</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div class="form-group">
                <label for="full_name" class="block text-sm font-medium text-gray-700">Full Name*</label>
                <input v-model="form.full_name" type="text" name="full_name" id="full_name" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
              </div>
  
              <div class="form-group">
                <label for="email_address" class="block text-sm font-medium text-gray-700">Email Address*</label>
                <input v-model="form.email_address" type="email" name="email_address" id="email_address" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
              </div>
  
              <div class="form-group">
                <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number*</label>
                <input v-model="form.phone_number" type="tel" name="phone_number" id="phone_number" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
              </div>
  
              <div class="form-group">
                <label for="address" class="block text-sm font-medium text-gray-700">Address*</label>
                <input v-model="form.address" type="text" name="address" id="address" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
              </div>
            </div>
  
            <h3 class="text-2xl font-bold text-gray-800 mb-4 mt-8">Donation Details</h3>
            <div class="grid grid-cols-1 gap-6">
              <div class="form-group">
                <label for="donation_type" class="block text-sm font-medium text-gray-700">Donation Type*</label>
                <div class="flex items-center space-x-4">
                  <label class="inline-flex items-center">
                    <input v-model="form.donation_type" type="radio" name="donation_type" value="one-time" class="form-radio text-indigo-600">
                    <span class="ml-2">One-time</span>
                  </label>
                  <label class="inline-flex items-center">
                    <input v-model="form.donation_type" type="radio" name="donation_type" value="recurring" class="form-radio text-indigo-600">
                    <span class="ml-2">Recurring</span>
                  </label>
                </div>
              </div>
  
              <div class="form-group">
                <label for="donation_amount" class="block text-sm font-medium text-gray-700">Donation Amount (USD)*</label>
                <input v-model="form.donation_amount" type="number" name="donation_amount" id="donation_amount" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
              </div>
  
              <div class="form-group">
                <label for="recurring_interval" class="block text-sm font-medium text-gray-700">Recurring Interval</label>
                <div class="flex items-center space-x-4">
                  <label class="inline-flex items-center">
                    <input v-model="form.recurring_interval" type="radio" name="recurring_interval" value="monthly" class="form-radio text-indigo-600">
                    <span class="ml-2">Monthly</span>
                  </label>
                  <label class="inline-flex items-center">
                    <input v-model="form.recurring_interval" type="radio" name="recurring_interval" value="quarterly" class="form-radio text-indigo-600">
                    <span class="ml-2">Quarterly</span>
                  </label>
                  <label class="inline-flex items-center">
                    <input v-model="form.recurring_interval" type="radio" name="recurring_interval" value="half-yearly" class="form-radio text-indigo-600">
                    <span class="ml-2">Half-yearly</span>
                  </label>
                  <label class="inline-flex items-center">
                    <input v-model="form.recurring_interval" type="radio" name="recurring_interval" value="yearly" class="form-radio text-indigo-600">
                    <span class="ml-2">Yearly</span>
                  </label>
                </div>
              </div>
            </div>
          </div>
  
          <div>
            <h3 class="text-2xl font-bold text-gray-800 mb-4">Bank Information</h3>
            <div class="grid grid-cols-1 gap-6">
              <div class="form-group">
                <label for="bank_name" class="block text-sm font-medium text-gray-700">Bank Name*</label>
                <select v-model="form.bank_name" name="bank_name" id="bank_name" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                  <option value="" disabled>Select bank</option>
                  <option value="Bank of America">Bank of America</option>
                  <option value="Chase">Chase</option>
                  <option value="Wells Fargo">Wells Fargo</option>
                  <option value="Citi">Citi</option>
                  <!-- Add more banks as needed -->
                </select>
              </div>
  
              <div class="form-group">
                <label for="account_number" class="block text-sm font-medium text-gray-700">Account Number*</label>
                <input v-model="form.account_number" type="text" name="account_number" id="account_number" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
              </div>
  
              <div class="form-group">
                <label for="account_holder_name" class="block text-sm font-medium text-gray-700">Account Holder Name*</label>
                <input v-model="form.account_holder_name" type="text" name="account_holder_name" id="account_holder_name" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
              </div>
  
              <div class="form-group">
                <label for="bank_form_download" class="block text-sm font-medium text-gray-700">Download Bank Form</label>
                <select v-model="form.bank_form_download" name="bank_form_download" id="bank_form_download" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                  <option value="" disabled>Select bank to download form</option>
                  <option value="Bank of America">Bank of America</option>
                  <option value="Chase">Chase</option>
                  <option value="Wells Fargo">Wells Fargo</option>
                  <option value="Citi">Citi</option>
                  <!-- Add more banks with respective download links -->
                </select>
                <div v-if="form.bank_form_download" class="mt-2">
                  <a :href="getBankFormLink(form.bank_form_download)" target="_blank" class="text-indigo-600 hover:text-indigo-900">Download {{ form.bank_form_download }} Form</a>
                </div>
              </div>
  
              <div class="form-group">
  <label for="signed_agreement_pdf" class="block text-sm font-medium text-gray-700">Attach Signed Agreement PDF</label>
  <div class="file-upload border-2 border-dashed border-gray-300 rounded-md p-4 text-center cursor-pointer" @click="openFileDialog('signed_agreement_pdf')">
    <span class="file-upload-icon text-4xl">✍️</span>
    <span class="file-upload-label block text-gray-500 mt-2">Click or drag to upload signed agreement</span>
    <input type="file" accept=".pdf,.jpg,.png" id="signed_agreement_pdf" class="hidden" @change="handleFileUpload('signed_agreement_pdf', $event)">
    <span v-if="form.signed_agreement_pdf" class="file-name mt-2 text-gray-600">{{ form.signed_agreement_pdf.name }}</span>
  </div>
</div>


            </div>
          </div>
        </div>
  
        <h3 class="text-2xl font-bold text-gray-800 mb-4 mt-8">
        <button type="button" @click="toggleDocuments" class="focus:outline-none">
          Agreement & Documents <span :class="{'transform rotate-45': showDocuments}" class="inline-block transform transition-transform duration-300">+</span>
        </button>
      </h3>
      <div v-show="showDocuments" class="bg-gray-100 p-4 rounded-md mb-4">
        <p class="text-sm text-gray-700">
          I hereby agree to contribute the specified amount to support the elderly through this organization. I understand that:
        </p>
        <ul class="list-disc pl-4 text-sm text-gray-700">
          <li>The donation amount will be automatically deducted from my account according to the selected interval</li>
          <li>I will be notified of any changes to the donation process</li>
          <li>I can cancel my support by providing 30 days notice</li>
          <li>The organization will use my contribution responsibly and ethically</li>
        </ul>
        <div class="form-group mt-4">
          <label for="terms_and_conditions" class="block text-sm font-medium text-gray-700">I agree to the terms and conditions*</label>
          <input v-model="form.terms_and_conditions" type="checkbox" name="terms_and_conditions" id="terms_and_conditions" required class="mt-1 block rounded-md">
        </div>
      </div>

      <div class="submit-container text-center mb-4">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300">Submit Application</button>
      </div>

      <div class="submit-container text-center">
        <button type="button" @click="generateSummary" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300">See Summary</button>
      </div>
    </form>
  </div>
</template>

<script>
import { Inertia } from '@inertiajs/inertia';
import jsPDF from 'jspdf';
import autoTable from 'jspdf-autotable';

export default {
  data() {
    return {
      form: {
        full_name: '',
        email_address: '',
        phone_number: '',
        address: '',
        donation_type: '',
        donation_amount: '',
        recurring_interval: '',
        bank_name: '',
        account_number: '',
        account_holder_name: '',
        terms_and_conditions: false,
        additional_comments: '',
        signed_agreement_pdf: null,
        bank_form_download: '',
      },
      showDocuments: false,
    };
  },
  methods: {

    openFileDialog(field) {
    document.getElementById(field).click();
  },
  handleFileUpload(field, event) {
    this.form[field] = event.target.files[0];
  },
  
  
    toggleDocuments() {
      this.showDocuments = !this.showDocuments;
    },
    
    
 
  
    getBankFormLink(bankName) {
      const links = {
        'Bank of America': 'path/to/Bank_of_America_Form.pdf',
        'Chase': 'path/to/Chase_Form.pdf',
        'Wells Fargo': 'path/to/Wells_Fargo_Form.pdf',
        'Citi': 'path/to/Citi_Form.pdf',
      };
      return links[bankName];
    },
    submitForm() {
        const formData = new FormData();
    for (let key in this.form) {
      formData.append(key, this.form[key]);
    }
    Inertia.post(route('donation-agreements.store'), formData, {
      headers: {
        'Content-Type': 'multipart/form-data',
      },
      onFinish: () => {
        alert('Donation agreement submitted successfully!');
      },
    });
  },
    generateSummary() {
      const doc = new jsPDF();
      doc.setFontSize(18);
      doc.text('Donation Agreement Summary', 14, 22);
      doc.setFontSize(12);
      doc.text(`Full Name: ${this.form.full_name}`, 14, 32);
      doc.text(`Email Address: ${this.form.email_address}`, 14, 40);
      doc.text(`Phone Number: ${this.form.phone_number}`, 14, 48);
      doc.text(`Address: ${this.form.address}`, 14, 56);
      doc.text(`Donation Type: ${this.form.donation_type}`, 14, 64);
      doc.text(`Donation Amount (USD): ${this.form.donation_amount}`, 14, 72);
      doc.text(`Recurring Interval: ${this.form.recurring_interval}`, 14, 80);
      doc.text(`Bank Name: ${this.form.bank_name}`, 14, 88);
      doc.text(`Account Number: ${this.form.account_number}`, 14, 96);
      doc.text(`Account Holder Name: ${this.form.account_holder_name}`, 14, 104);
      doc.text('Agreement:', 14, 112);
      const agreementText = [
        'I hereby agree to contribute the specified amount to support the elderly through this organization. I understand that:',
        '- The donation amount will be automatically deducted from my account according to the selected interval',
        '- I will be notified of any changes to the donation process',
        '- I can cancel my support by providing 30 days notice',
        '- The organization will use my contribution responsibly and ethically'
      ];
      autoTable(doc, {
        startY: 118,
        body: agreementText.map(text => [text]),
      });
      doc.save('Donation_Agreement_Summary.pdf');
    },
  },
};
</script>

<style scoped>
.file-upload {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 1.5rem;
  border: 2px dashed #ddd;
  border-radius: 4px;
  cursor: pointer;
  transition: border-color 0.3s;
}
.file-upload:hover {
  border-color: #4A90E2;
}
.file-upload-icon {
  font-size: 2rem;
  color: #4A90E2;
  margin-bottom: 0.5rem;
}
.file-upload-label {
  color: #666;
}
</style>
