<div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/nice-select2/dist/css/nice-select2.css">

    <style>
        /* SECTION WRAPPER */
        .custom-sec1 {
            padding: 0 10px;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            display: flex;
            justify-content: center;
            margin-top: 28px; 
            position: relative;
            z-index: 100;
        }

        /* THE ROUNDED RECTANGLE CARD */
        .custom-sec1-content {
            width: 100%;
            max-width: 1100px;
            background: #ffffff;
            border-radius: 20px ;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            border: 1px solid #b0b7c3;
        }

        .custom-sec1-inner h4 {
            font-size: 34px;
            font-weight: 700;
            margin: 0 0 8px 0;
            color: #0a1240;
            letter-spacing: -0.02em;
            text-align: center;
        }

        .highlight-blue {
            color: #00AEEF;
        }

        .custom-sec1-inner p {
            font-size: 18px;
            color: #8a92a6;
            margin-bottom: 35px;
            font-weight: 400;
            text-align: center;
        }

        /* GRID LAYOUT */
        .select-device-box {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            margin-bottom: 25px;
        }

        .input-group {
            display: flex;
            flex-direction: column;
        }

        .input-group label {
            font-size: 11px;
            text-transform: uppercase;
            font-weight: 700;
            color: #0f0f0f;
            margin-bottom: 8px;
            letter-spacing: 0.05em;
        }

        /* CUSTOM DROPDOWN STYLING */
        .nice-select {
            height: 50px !important;
            line-height: 50px !important;
            border-radius: 12px !important;
            border: 1px solid #e0e4ec !important;
            background: #fafbfc !important;
            padding-left: 20px !important;
            font-size: 14px !important;
            width: 100% !important;
            transition: all 0.3s ease !important;
        }

        /* HIDE SEARCH BOX AND PLACEHOLDER OPTIONS IN LIST */
        .nice-select-search-box {
            display: none !important;
        }

        /* This hides the "Select..." option from the actual dropdown list */
        .nice-select .option[data-value=""] {
            display: none !important;
        }

        .nice-select:after {
            right: 20px !important;
        }

        .nice-select:hover {
            border-color: #00AEEF !important;
            background: #fff !important;
        }

        .nice-select.disabled {
            opacity: 0.6;
            background: #f4f6f8 !important;
            cursor: not-allowed;
        }

        .nice-select .list {
            border-radius: 15px !important;
            margin-top: 8px !important;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1) !important;
            border: 1px solid #eef0f3 !important;
            padding: 5px !important;
        }

        .nice-select .option {
            line-height: 40px !important;
            min-height: 40px !important;
            border-radius: 8px !important;
            padding-left: 15px !important;
            margin-bottom: 2px !important;
        }

        /* BUTTON */
        .search-btn {
            width: 100%;
            height: 55px;
            border-radius: 10px;
            border: none;
            font-size: 16px;
            font-weight: 600;
            color: white;
            background: #00AEEF;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .search-btn:hover {
            background: #049fd9;
            transform: translateY(-1px);
            box-shadow: 0 5px 15px rgba(0, 174, 239, 0.3);
        }

        /* RESPONSIVE */
        @media (max-width: 992px) {
            .select-device-box { grid-template-columns: repeat(2, 1fr); }
            .custom-sec1 { margin-top: 20px;; }
        }
        @media (max-width: 576px) {
            .select-device-box { grid-template-columns: 1fr; }
            .custom-sec1 { margin-top: 50px; }
            .custom-sec1-inner h4 { font-size: 24px; }
        }
    </style>

    @php
        $repairCategories = \App\Models\Category::where('service', \App\Helpers\ServiceType::REPAIR)
            ->where('status', 'Publish')
            ->get();

        $allDeviceTypes = \App\Models\DeviceType::whereHas('category', function ($q) {
                $q->where('service', \App\Helpers\ServiceType::REPAIR)->where('status', 'Publish');
            })
            ->where('status', 'Publish')
            ->get(['id', 'name', 'category_id']);

        $allModals = \App\Models\Modal::where('status', 'Publish')
            ->get(['id', 'name', 'device_type_id']);
    @endphp

    <section class="custom-sec1">
        <div class="custom-sec1-content">
            <div class="custom-sec1-inner">
                <h4>Find Your Repair <span class="highlight-blue">Price Instantly</span></h4>
                <p>Select your details below to get an instant quote.</p>

                <div class="select-device-box">
                    <div class="input-group">
                        <label>Device Type</label>
                        <select id="category" onchange="updateDeviceTypeOptions()">
                            <option value="">Select Device</option>
                            @foreach($repairCategories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="input-group">
                        <label>Brand</label>
                        <select id="device_type" onchange="updateModalOptions()" disabled>
                            <option value="">Select Brand</option>
                        </select>
                    </div>

                    <div class="input-group">
                        <label>Model</label>
                        <select id="modal" onchange="updateIssueStatus()" disabled>
                            <option value="">Select Model</option>
                        </select>
                    </div>

                    <div class="input-group">
                        <label>Issue</label>
                        <select id="issue" disabled>
                            <option value="">Select Issue</option>
                            <option value="screen">Screen Replacement</option>
                            <option value="battery">Battery Issues</option>
                            <option value="port">Charging Port</option>
                            <option value="water">Water Damage</option>
                        </select>
                    </div>
                </div>

                <button class="search-btn" onclick="redirectToRepairTypes()">
                    Get Instant Quote & Book Now →
                </button>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/nice-select2/dist/js/nice-select2.js"></script>

    <script>
        const deviceTypesData = @json($allDeviceTypes);
        const modalsData = @json($allModals);

        let nscat, nstype, nsmodal, nsissue;

        document.addEventListener("DOMContentLoaded", function() {
            const options = { searchable: false };
            
            nscat   = NiceSelect.bind(document.getElementById("category"), options);
            nstype  = NiceSelect.bind(document.getElementById("device_type"), options);
            nsmodal = NiceSelect.bind(document.getElementById("modal"), options);
            nsissue = NiceSelect.bind(document.getElementById("issue"), options);
        });

        function updateDeviceTypeOptions() {
            const categoryId = document.getElementById('category').value;
            const deviceTypeSelect = document.getElementById('device_type');
            
            // Reset further down the chain
            deviceTypeSelect.innerHTML = '<option value="">Select Brand</option>';
            deviceTypeSelect.disabled = true;
            
            resetModal();
            resetIssue();

            if (categoryId) {
                const filtered = deviceTypesData.filter(dt => String(dt.category_id) === String(categoryId));
                filtered.forEach(dt => {
                    const option = document.createElement('option');
                    option.value = dt.id;
                    option.textContent = dt.name;
                    deviceTypeSelect.appendChild(option);
                });
                if (filtered.length > 0) deviceTypeSelect.disabled = false;
            }
            
            nstype.update();
            nsmodal.update();
            nsissue.update();
        }

        function updateModalOptions() {
            const deviceTypeId = document.getElementById('device_type').value;
            const modalSelect = document.getElementById('modal');
            
            resetModal();
            resetIssue();

            if (deviceTypeId) {
                const filtered = modalsData.filter(m => String(m.device_type_id) === String(deviceTypeId));
                filtered.forEach(m => {
                    const option = document.createElement('option');
                    option.value = m.id;
                    option.textContent = m.name;
                    modalSelect.appendChild(option);
                });
                if (filtered.length > 0) modalSelect.disabled = false;
            }
            
            nsmodal.update();
            nsissue.update();
        }

        function updateIssueStatus() {
            const modalId = document.getElementById('modal').value;
            const issueSelect = document.getElementById('issue');
            
            if (modalId) {
                issueSelect.disabled = false;
            } else {
                issueSelect.disabled = true;
                issueSelect.value = "";
            }
            nsissue.update();
        }

        // Helper reset functions
        function resetModal() {
            const modalSelect = document.getElementById('modal');
            modalSelect.innerHTML = '<option value="">Select Model</option>';
            modalSelect.disabled = true;
        }

        function resetIssue() {
            const issueSelect = document.getElementById('issue');
            issueSelect.value = "";
            issueSelect.disabled = true;
        }

        function redirectToRepairTypes() {
            const categoryId = document.getElementById('category').value;
            const deviceTypeId = document.getElementById('device_type').value;
            const modalId = document.getElementById('modal').value;
            const issueId = document.getElementById('issue').value;

            if (!categoryId || !deviceTypeId || !modalId || !issueId) { 
                alert('Please complete all selections, including the issue.'); 
                return; 
            }
            const url = "{{ url('') }}" + '/' + deviceTypeId + '/' + modalId + '/repair_types';
            window.location.href = url;
        }
    </script>
</div>