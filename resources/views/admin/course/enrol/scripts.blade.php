<script>
    document.addEventListener('DOMContentLoaded', function () {
        const courseIdElement = document.getElementById('course_id');
        const paidAmountElement = document.getElementById('paid_amount');
        const discountElement = document.getElementById('discount');
        const discountTypeElement = document.getElementById('discount_type');
        const discountPercentageElement = document.getElementById('discount_percentage');
        const paymentDueElement = document.getElementById('payment_due');
        const discountPercentageContainer = document.querySelector('.col-md-4[style="display: none"]');
        let coursePrice = 0;

        // Function to calculate and update payment due
        const updatePaymentDue = () => {
            const paidAmount = parseFloat(paidAmountElement.value) || 0;
            let discount = parseFloat(discountElement.value) || 0;

            if (discountTypeElement.value === 'percentage' && coursePrice > 0) {
                const percentage = parseFloat(discountPercentageElement.value) || 0;
                discount = (percentage / 100) * coursePrice;
                discountElement.value = discount.toFixed(0);
            }

            const paymentDue = coursePrice - paidAmount - discount;
            paymentDueElement.value = paymentDue.toFixed(0);
        };

        // Function to fetch course price
        const fetchCoursePrice = () => {
            const courseId = courseIdElement.value;
            fetch(`/admin/course/purchase/course-price/${courseId}`)
                .then(response => response.json())
                .then(data => {
                    coursePrice = parseFloat(data.price);
                    updatePaymentDue(); // Update payment due after fetching course price
                    document.getElementById('course_price_info').innerText = `Course Price: ${coursePrice}`;
                })
                .catch(error => console.error('Error fetching course price:', error));
        };

        // Show or hide discount percentage field based on discount type
        const toggleDiscountPercentageField = () => {
            if (discountTypeElement.value === 'percentage') {
                discountPercentageContainer.style.display = 'block';
                discountElement.readOnly = true;
            } else {
                discountPercentageContainer.style.display = 'none';
                discountElement.readOnly = false;
                discountElement.value = ''; // Clear discount field if type is not percentage
            }
            updatePaymentDue();
        };

        courseIdElement.addEventListener('change', fetchCoursePrice);
        paidAmountElement.addEventListener('input', updatePaymentDue);
        discountElement.addEventListener('input', updatePaymentDue);
        discountTypeElement.addEventListener('change', toggleDiscountPercentageField);
        discountPercentageElement.addEventListener('input', updatePaymentDue);
    });

</script>
