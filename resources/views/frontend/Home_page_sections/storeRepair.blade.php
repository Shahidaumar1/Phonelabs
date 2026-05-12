<div class="faq-section">
    <div class="faq-container">
        <h2>Frequently Asked Questions</h2>
        <p class="faq-subtitle">Get answers to the most common questions about our repair services</p>

        <div class="faq-item">
            <button class="faq-question">
                How long does a typical repair take?
                <span class="icon">⌄</span>
            </button>
            <div 
                <p class="faq-answer">Most common repairs like screen replacements and battery changes are completed within 30-60 minutes. Complex issues may take 2-4 hours. We'll always provide an accurate time estimate upfront and can offer same-day service for most repairs.</p>
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-question">
                Do you use quality parts?
                <span class="icon">⌄</span>
            </button>
            <div >
                <p  class="faq-answer">Absolutely! We use both genuine manufacturer parts and high-quality OEM (Original Equipment Manufacturer) parts, depending on your preference and budget. All parts are rigorously tested and come with our comprehensive warranty for your peace of mind. We're happy to discuss the best option for your specific repair.</p>
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-question">
                What warranty do you provide?
                <span class="icon">⌄</span>
            </button>
            <div>
                <p class="faq-answer"> Most device repairs include a comprehensive 24-month* warranty covering the repaired component. Console repairs come with a 6-month warranty. Our warranty covers both parts and labor, giving you complete peace of mind</p>
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-question">
                What payment methods do you accept?
                <span class="icon">⌄</span>
            </button>
            <div >
                <p class="faq-answer">We accept cash, all major credit and debit cards, and bank transfers. Payment is only required once you're completely satisfied with the repair. We also offer special discounts for NHS staff, students, and emergency services.</p>
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-question">
                Will using your service void my manufacturer's warranty?
                <span class="icon">⌄</span>
            </button>
            <div>
                <p class="faq-answer">We recommend checking your manufacturer's warranty terms and conditions before proceeding with third-party repairs, as policies vary between manufacturers. Some warranties may be affected by third-party repairs while others may not. However, we provide our own comprehensive 24-month* warranty on all repairs, which often offers better coverage than many manufacturer warranties.</p>
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-question">
                Can you fix water-damaged phones?
                <span class="icon">⌄</span>
            </button>
            <div>
                <p class="faq-answer">Yes! We specialize in water damage recovery using professional techniques and equipment. We offer a free inspection service to assess the damage and provide an honest evaluation of repair possibilities. Success rates vary depending on the extent of damage and how quickly the device is brought to us.</p>
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-question">
                Do you offer pickup and delivery?
                <span class="icon">⌄</span>
            </button>
            <div >
                <p class="faq-answer">Absolutely! We offer free pickup and delivery within 3 miles of our Burnley location. Most repairs are completed and returned the same day. We also offer a mail-in service for customers further away, with fully insured shipping both ways.</p>
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-question">
                What should I do before bringing my device for repair?
                <span class="icon">⌄</span>
            </button>
            <div >
                <p class="faq-answer">We recommend backing up your device if possible, removing your SIM card and memory card, and noting down any special requirements. Don't worry if you can't access your device - our technicians can help with data backup and recovery.</p>
            </div>
        </div>
    </div>
</div>
<script>
document.querySelectorAll('.faq-question').forEach(button => {
    button.addEventListener('click', () => {
        const item = button.parentElement;
        item.classList.toggle('active');
    });
});
</script>

<style>
.faq-section {
    background: #ffffff;
    padding: 70px 15px;
}

.faq-container {
    max-width: 900px;
    margin: auto;
    text-align: center;
}

.faq-container h2 {
    font-size: 50px;
    font-weight: 700;
    margin-bottom: 10px;
}

.faq-subtitle {
    font-size: 20px;
    color: #6c757d;
    margin-bottom: 40px;
}

.faq-item {
    margin-bottom: 15px;
    border-radius: 10px;
    box-shadow: 0px 4px 12px rgba(0,0,0,0.08);
    overflow: hidden;
}

.faq-question {
    width: 100%;
    background: #ffffff;
    border: none;
    padding: 20px 25px;
    font-size: 18px;
    font-weight: 600;
    display: flex;
    justify-content: space-between;
    align-items: center;
    cursor: pointer;
}

.faq-question .icon {
    font-size: 22px;
    transition: transform 0.3s ease;
}

.faq-answer {
    display: none;
    padding: 0 25px 20px;
    text-align: left;
    color: #555;
    font-size:17px !important;
}

.faq-item.active .faq-answer {
    display: block;
  
}

.faq-item.active .icon {
    transform: rotate(180deg);
}
</style>