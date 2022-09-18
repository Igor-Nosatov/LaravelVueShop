<div class="mb-3 text-start pt-2 pb-2">
    <input
      type="text"
      class="form-control form-control-gift-cart"
      placeholder="Your Name"
      v-model="form_card_electronic.name"
      required/>
  </div>

  <div class="mb-3 text-start pt-2 pb-2">
    <input
      type="email"
      class="form-control form-control-gift-cart"
      placeholder="Your Email"
      v-model="form_card_electronic.email"
    required/>
  </div>

  <div class="mb-3 text-start pt-2 pb-2">
    <input
      type="text"
      class="form-control form-control-gift-cart"
      placeholder="Recipient's Name"
      v-model="form_card_electronic.recipient_name"
      required/>
  </div>

  <div class="mb-3 text-start pt-2 pb-2">
    <input
      type="text"
      class="form-control form-control-gift-cart"
      placeholder="Confirm Recipient's Email"
      v-model="form_card_electronic.recipient_email"
      required />
  </div>

  <div class="mb-3 text-start pt-2 pb-2">
    <input
      type="text"
      class="form-control form-control-gift-cart"
      placeholder="Add a message(Optional)"
      v-model="form_card_electronic.message"
    />
  </div>

  <div class="select-amount pt-3 pb-3">
    <label for="amount">Amount</label>
    <br />
    <select class="form-select" aria-label="amount" name="amount" id="amount"  v-model="form_card_electronic.amount">
      <option disabled value="">Please select Sum</option>
      <option :value="{ amount: 25 }">$25</option>
      <option :value="{ amount: 50 }">$50</option>
      <option :value="{ amount: 100 }">$100</option>
      <option :value="{ amount: 200 }">$200</option>
    </select>
  </div>