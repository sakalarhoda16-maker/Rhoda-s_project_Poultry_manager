<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PoultryPro User Dashboard</title>
    <style>
        :root {
            --primary: #1B5E20; /* Dark Green */
            --secondary: #FF9800; /* Orange */
            --accent: #FFFFFF; /* White */
            --light: #E8F5E9; /* Light Green */
            --dark: #000000; /* Black */
            --text: #333333;
            --sidebar-width: 250px;
            --card-bg: #FFFFFF;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }
        
        body {
            background-color: var(--light);
            color: var(--text);
            line-height: 1.6;
            display: flex;
            min-height: 100vh;
        }
        
        /* Sidebar Styles */
        .sidebar {
            width: var(--sidebar-width);
            background: var(--primary);
            color: var(--accent);
            height: 100vh;
            position: fixed;
            padding: 20px 0;
            transition: all 0.3s ease;
            z-index: 1000;
            overflow-y: auto;
        }
        
        .sidebar-logo {
            text-align: center;
            padding: 20px;
            margin-bottom: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .sidebar-logo h2 {
            font-size: 24px;
            font-weight: 700;
            color: var(--accent);
        }
        
        .sidebar-logo span {
            color: var(--secondary);
        }
        
        .sidebar-menu {
            list-style: none;
            padding: 0 15px;
        }
        
        .sidebar-menu li {
            margin-bottom: 10px;
        }
        
        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 12px 15px;
            text-decoration: none;
            color: var(--accent);
            border-radius: 5px;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .sidebar-menu a:hover, .sidebar-menu a.active {
            background: var(--secondary);
            color: var(--dark);
        }
        
        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            padding: 20px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        .content-wrapper {
            flex: 1;
        }
        
        /* Header */
        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .dashboard-header h1 {
            color: var(--primary);
            font-weight: 600;
        }
        
        .user-info {
            display: flex;
            align-items: center;
        }
        
        .notification-bell {
            position: relative;
            margin-right: 20px;
            cursor: pointer;
            color: var(--primary);
        }
        
        .notification-count {
            position: absolute;
            top: -5px;
            right: -5px;
            background: var(--secondary);
            color: var(--dark);
            font-size: 12px;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
        
        .user-profile {
            display: flex;
            align-items: center;
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--primary);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            font-weight: bold;
            border: 2px solid var(--secondary);
        }
        
        .user-role {
            background: var(--secondary);
            color: var(--dark);
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            margin-left: 10px;
            font-weight: bold;
        }
        
        .farm-name {
            font-weight: 600;
            color: var(--primary);
        }
        
        /* Home Button */
        .home-button {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            background: var(--primary);
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 15px;
            transition: background 0.3s ease;
            font-weight: 500;
        }
        
        .home-button:hover {
            background: var(--secondary);
            color: var(--dark);
        }
        
        /* Summary Cards */
        .summary-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .card {
            background: var(--card-bg);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            text-align: center;
            border-left: 4px solid var(--primary);
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .card-title {
            font-size: 16px;
            color: var(--primary);
            font-weight: 500;
            width: 100%;
            text-align: center;
            margin-bottom: 15px;
        }
        
        .card-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            background: var(--primary);
            margin: 0 auto 15px;
            font-size: 24px;
        }
        
        .card-value {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 5px;
            color: var(--primary);
        }
        
        .card-footer {
            font-size: 14px;
            color: #555;
        }
        
        /* Forms */
        .form-container {
            background: var(--card-bg);
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            border-left: 4px solid var(--secondary);
        }
        
        .form-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }
        
        .form-title {
            font-size: 20px;
            color: var(--primary);
            font-weight: 600;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-row {
            display: flex;
            gap: 15px;
            margin-bottom: 15px;
        }
        
        .form-input {
            flex: 1;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--primary);
        }
        
        input, select, textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s ease;
            color: #333;
        }
        
        input:focus, select:focus, textarea:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 2px rgba(27, 94, 32, 0.2);
        }
        
        .btn {
            display: inline-block;
            padding: 10px 18px;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 500;
            transition: background 0.3s ease;
            font-size: 16px;
        }
        
        .btn:hover {
            background: var(--secondary);
            color: var(--dark);
        }
        
        .btn-secondary {
            background: #6c757d;
            color: white;
        }
        
        .btn-secondary:hover {
            background: #5a6268;
            color: white;
        }
        
        /* Report Section */
        .report-section {
            background: var(--card-bg);
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            border-left: 4px solid var(--primary);
        }
        
        .report-controls {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }
        
        .report-content {
            background: #f9f9f9;
            border-radius: 8px;
            padding: 20px;
            margin-top: 20px;
            max-height: 400px;
            overflow-y: auto;
            color: #333;
        }
        
        .report-table {
            width: 100%;
            border-collapse: collapse;
            color: #333;
        }
        
        .report-table th, .report-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            color: #333;
        }
        
        .report-table th {
            background-color: var(--primary);
            color: white;
            font-weight: 600;
        }
        
        .report-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        
        .report-table tr:hover {
            background-color: #e9f7e9;
        }
        
        /* Flocks Section */
        .flocks-section {
            background: var(--card-bg);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            border-left: 4px solid var(--primary);
        }
        
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .section-title {
            font-size: 20px;
            color: var(--primary);
            font-weight: 600;
        }
        
        .view-all {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
        }
        
        .flock-card {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            background: #f9f9f9;
        }
        
        .flock-card h4 {
            color: var(--primary);
            margin-bottom: 8px;
        }
        
        .flock-card p {
            color: #555;
            margin-bottom: 10px;
        }
        
        /* Profile Section */
        .profile-section {
            background: var(--card-bg);
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            border-left: 4px solid var(--secondary);
            display: none;
        }
        
        .profile-header {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }
        
        .profile-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: var(--primary);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 20px;
            font-size: 32px;
            font-weight: bold;
            border: 3px solid var(--secondary);
        }
        
        .profile-info h3 {
            color: var(--primary);
            margin-bottom: 5px;
        }
        
        .profile-details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        
        .detail-group {
            margin-bottom: 15px;
        }
        
        .detail-label {
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 5px;
        }
        
        .detail-value {
            color: #555;
        }
        
        /* Tasks Section */
        .tasks-section {
            background: var(--card-bg);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            border-left: 4px solid var(--secondary);
        }
        
        .task-item {
            display: flex;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #eee;
        }
        
        .task-item:last-child {
            border-bottom: none;
        }
        
        .task-checkbox {
            margin-right: 15px;
        }
        
        .task-details {
            flex: 1;
        }
        
        .task-title {
            font-weight: 500;
            color: var(--primary);
        }
        
        .task-due {
            font-size: 14px;
            color: #555;
        }
        
        .task-priority {
            padding: 3px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: bold;
        }
        
        .priority-high {
            background: #ffebee;
            color: #c62828;
        }
        
        .priority-medium {
            background: #fff3e0;
            color: #ef6c00;
        }
        
        .priority-low {
            background: #e8f5e9;
            color: #2e7d32;
        }
        
        /* Quick Actions */
        .quick-actions {
            display: flex;
            gap: 15px;
            margin-top: 30px;
            flex-wrap: wrap;
            background: var(--card-bg);
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        
        .action-button {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 12px 20px;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 500;
            transition: background 0.3s ease;
            font-size: 16px;
            flex: 1;
        }
        
        .action-button:hover {
            background: var(--secondary);
            color: var(--dark);
        }
        
        /* Tabs */
        .tabs {
            display: flex;
            border-bottom: 1px solid #ddd;
            margin-bottom: 20px;
        }
        
        .tab {
            padding: 10px 20px;
            cursor: pointer;
            border-bottom: 3px solid transparent;
            transition: all 0.3s ease;
            color: #333;
        }
        
        .tab.active {
            border-bottom: 3px solid var(--secondary);
            color: var(--primary);
            font-weight: 600;
        }
        
        .tab-content {
            display: none;
        }
        
        .tab-content.active {
            display: block;
        }
        
        /* Logout Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 2000;
            justify-content: center;
            align-items: center;
        }
        
        .modal-content {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            width: 90%;
            max-width: 400px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            text-align: center;
        }
        
        .modal-title {
            color: var(--primary);
            margin-bottom: 15px;
        }
        
        .modal-buttons {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }
        
        .modal-buttons .btn {
            flex: 1;
        }
        
        /* Responsive Design */
        @media (max-width: 992px) {
            .form-row {
                flex-direction: column;
                gap: 0;
            }
            
            .report-controls {
                flex-direction: column;
            }
            
            .profile-details {
                grid-template-columns: 1fr;
            }
        }
        
        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
            }
            
            .sidebar-logo h2, .sidebar-menu span {
                display: none;
            }
            
            .sidebar-menu {
                text-align: center;
            }
            
            .main-content {
                margin-left: 70px;
            }
            
            .summary-cards {
                grid-template-columns: 1fr 1fr;
            }
            
            .quick-actions {
                flex-direction: column;
            }
            
            .tabs {
                flex-wrap: wrap;
            }
            
            .home-button span {
                display: none;
            }
            
            .home-button {
                padding: 8px 12px;
            }
        }
        
        @media (max-width: 576px) {
            .summary-cards {
                grid-template-columns: 1fr;
            }
            
            .dashboard-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .user-info {
                width: 100%;
                justify-content: space-between;
            }
            
            .home-button {
                margin-right: 10px;
            }
        }
    </style>
</head>
<body>
    <!-- Logout Confirmation Modal -->
    <div class="modal" id="logout-modal">
        <div class="modal-content">
            <h2 class="modal-title">Confirm Logout</h2>
            <p>Are you sure you want to log out of PoultryPro?</p>
            <div class="modal-buttons">
                <button class="btn btn-secondary" id="cancel-logout">Cancel</button>
                <button class="btn" id="confirm-logout">Log Out</button>
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-logo">
            <h2>Poultry<span>Pro</span></h2>
        </div>
        <ul class="sidebar-menu">
            <li><a href="#" class="active" data-target="dashboard">
                <span>Dashboard</span>
            </a></li>
            <li><a href="#" data-target="flocks">
                <span>My Flocks</span>
            </a></li>
            <li><a href="#" data-target="health">
                <span>Health Tracking</span>
            </a></li>
            <li><a href="#" data-target="reports">
                <span>Reports</span>
            </a></li>
            <li><a href="#" data-target="profile">
                <span>Profile</span>
            </a></li>
            <li><a href="#" data-target="logout">
                <span>Logout</span>
            </a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="content-wrapper">
            <!-- Header -->
            <div class="dashboard-header">
                <div>
                    <h1>My Dashboard</h1>
                    <span class="user-role" id="display-role">Farm Manager</span>
                </div>
                <div class="user-info">
                    <!-- Home Button -->
                    <a href="index.php" class="home-button">

                        <span>Home</span>
                    </a>
                    
                    <div class="user-profile">
                        <div class="user-avatar" id="farm-avatar">FP</div>
                        <span class="farm-name" id="display-farm-name">Fresh Poultry Farm</span>
                    </div>
                </div>
            </div>

            <!-- Summary Cards -->
            <div class="summary-cards">
                <div class="card">
                    <div class="card-icon">
                        <span>🐔</span>
                    </div>
                    <div class="card-title">Total Birds</div>
                    <div class="card-value">1,250</div>
                    <div class="card-footer">Across 3 flocks</div>
                </div>
                
                <div class="card">
                    <div class="card-icon" style="background-color: #1b5a02;">
                        <span>❤️</span>
                    </div>
                    <div class="card-title">Mortality Rate</div>
                    <div class="card-value">2.1%</div>
                    <div class="card-footer">This month</div>
                </div>
                
                <div class="card">
                    <div class="card-icon" style="background-color: var(--secondary);">
                        <span>🍽️</span>
                    </div>
                    <div class="card-title">Feed Cost</div>
                    <div class="card-value">$1,240</div>
                    <div class="card-footer">This month</div>
                </div>
                
                <div class="card">
                    <div class="card-icon" style="background-color: #4CAF50;">
                        <span>🥚</span>
                    </div>
                    <div class="card-title">Egg Production</div>
                    <div class="card-value">8,425</div>
                    <div class="card-footer">This month</div>
                </div>
            </div>

            <!-- Tabs for Forms -->
            <div class="tabs">
                <div class="tab active" data-tab="flock">Add Flock</div>
                <div class="tab" data-tab="metrics">Record Metrics</div>
                <div class="tab" data-tab="health">Record Health</div>
                <div class="tab" data-tab="transaction">Record Transaction</div>
            </div>

            <!-- Add Flock Form -->
            <div class="form-container tab-content active" id="flock-tab">
                <div class="form-header">
                    <h3 class="form-title">Add New Flock</h3>
                </div>
                
                <form id="flock-form">
                    <div class="form-row">
                        <div class="form-input">
                            <label for="flock-id">Flock ID</label>
                            <input type="text" id="flock-id" placeholder="e.g., Broiler-001" required>
                        </div>
                        
                        <div class="form-input">
                            <label for="flock-type">Flock Type</label>
                            <select id="flock-type" required>
                                <option value="">Select flock type</option>
                                <option value="broiler">Broiler</option>
                                <option value="layer">Layer</option>
                                <option value="breeder">Breeder</option>
                                <option value="pullet">Pullet</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-input">
                            <label for="flock-size">Number of Birds</label>
                            <input type="number" id="flock-size" placeholder="Enter number of birds" required>
                        </div>
                        
                        <div class="form-input">
                            <label for="location">Location/House</label>
                            <input type="text" id="location" placeholder="e.g., House A" required>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-input">
                            <label for="start-date">Start Date</label>
                            <input type="date" id="start-date" required>
                        </div>
                        
                        <div class="form-input">
                            <label for="source">Source</label>
                            <input type="text" id="source" placeholder="e.g., Hatchery name">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="notes">Notes</label>
                        <textarea id="notes" rows="3" placeholder="Any additional information about this flock"></textarea>
                    </div>
                    
                    <button type="submit" class="btn">Add Flock</button>
                </form>
            </div>

            <!-- Record Metrics Form -->
            <div class="form-container tab-content" id="metrics-tab">
                <div class="form-header">
                    <h3 class="form-title">Record Daily Metrics</h3>
                </div>
                
                <form id="metrics-form">
                    <div class="form-row">
                        <div class="form-input">
                            <label for="flock-select">Select Flock</label>
                            <select id="flock-select" required>
                                <option value="">Select a flock</option>
                                <option value="broiler-001">Broiler-001</option>
                                <option value="layer-003">Layer-003</option>
                                <option value="broiler-002">Broiler-002</option>
                            </select>
                        </div>
                        
                        <div class="form-input">
                            <label for="record-date">Date</label>
                            <input type="date" id="record-date" required>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-input">
                            <label for="mortality">Mortality Count</label>
                            <input type="number" id="mortality" placeholder="Number of dead birds" min="0">
                        </div>
                        
                        <div class="form-input">
                            <label for="feed-consumption">Feed Consumption (kg)</label>
                            <input type="number" id="feed-consumption" placeholder="Total feed consumed" min="0" step="0.1">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-input">
                            <label for="egg-production">Egg Production</label>
                            <input type="number" id="egg-production" placeholder="Number of eggs" min="0">
                        </div>
                        
                        <div class="form-input">
                            <label for="water-consumption">Water Consumption (L)</label>
                            <input type="number" id="water-consumption" placeholder="Liters of water consumed" min="0" step="0.1">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="health-notes">Health Observations</label>
                        <textarea id="health-notes" rows="2" placeholder="Note any health issues or observations"></textarea>
                    </div>
                    
                    <button type="submit" class="btn">Record Metrics</button>
                </form>
            </div>

            <!-- Record Health Form -->
            <div class="form-container tab-content" id="health-tab">
                <div class="form-header">
                    <h3 class="form-title">Record Health Data</h3>
                </div>
                
                <form id="health-form">
                    <div class="form-row">
                        <div class="form-input">
                            <label for="health-flock">Select Flock</label>
                            <select id="health-flock" required>
                                <option value="">Select a flock</option>
                                <option value="broiler-001">Broiler-001</option>
                                <option value="layer-003">Layer-003</option>
                                <option value="broiler-002">Broiler-002</option>
                            </select>
                        </div>
                        
                        <div class="form-input">
                            <label for="health-date">Date</label>
                            <input type="date" id="health-date" required>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-input">
                            <label for="disease">Disease/Observation</label>
                            <input type="text" id="disease" placeholder="e.g., Respiratory issues" required>
                        </div>
                        
                        <div class="form-input">
                            <label for="affected-count">Number Affected</label>
                            <input type="number" id="affected-count" placeholder="Number of birds affected" min="0">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-input">
                            <label for="treatment">Treatment Given</label>
                            <input type="text" id="treatment" placeholder="e.g., Antibiotics, Vaccination">
                        </div>
                        
                        <div class="form-input">
                            <label for="vet-name">Veterinarian Name</label>
                            <input type="text" id="vet-name" placeholder="Name of veterinarian">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="health-notes">Additional Notes</label>
                        <textarea id="health-notes" rows="3" placeholder="Any additional health observations"></textarea>
                    </div>
                    
                    <button type="submit" class="btn">Record Health Data</button>
                </form>
            </div>

            <!-- Record Transaction Form -->
            <div class="form-container tab-content" id="transaction-tab">
                <div class="form-header">
                    <h3 class="form-title">Record Transaction</h3>
                </div>
                
                <form id="transaction-form">
                    <div class="form-row">
                        <div class="form-input">
                            <label for="transaction-type">Transaction Type</label>
                            <select id="transaction-type" required>
                                <option value="">Select type</option>
                                <option value="income">Income</option>
                                <option value="expense">Expense</option>
                            </select>
                        </div>
                        
                        <div class="form-input">
                            <label for="transaction-date">Date</label>
                            <input type="date" id="transaction-date" required>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-input">
                            <label for="amount">Amount ($)</label>
                            <input type="number" id="amount" placeholder="Enter amount" min="0" step="0.01" required>
                        </div>
                        
                        <div class="form-input">
                            <label for="category">Category</label>
                            <select id="category" required>
                                <option value="">Select category</option>
                                <option value="feed">Feed</option>
                                <option value="medication">Medication</option>
                                <option value="equipment">Equipment</option>
                                <option value="labor">Labor</option>
                                <option value="egg-sales">Egg Sales</option>
                                <option value="bird-sales">Bird Sales</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" id="description" placeholder="Brief description of transaction" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="transaction-notes">Notes</label>
                        <textarea id="transaction-notes" rows="2" placeholder="Any additional notes"></textarea>
                    </div>
                    
                    <button type="submit" class="btn">Record Transaction</button>
                </form>
            </div>

            <!-- Report Generator -->
            <div class="report-section">
                <div class="form-header">
                    <h3 class="form-title">Generate Report</h3>
                </div>
                
                <div class="report-controls">
                    <div class="form-input">
                        <label for="report-type">Report Type</label>
                        <select id="report-type">
                            <option value="flocks">Flocks Summary</option>
                            <option value="metrics">Production Metrics</option>
                            <option value="health">Health Records</option>
                            <option value="financial">Financial Summary</option>
                            <option value="comprehensive">Comprehensive Report</option>
                        </select>
                    </div>
                    
                    <div class="form-input">
                        <label for="start-date-report">Start Date</label>
                        <input type="date" id="start-date-report">
                    </div>
                    
                    <div class="form-input">
                        <label for="end-date-report">End Date</label>
                        <input type="date" id="end-date-report">
                    </div>
                    
                    <div class="form-input">
                        <label>&nbsp;</label>
                        <button type="button" class="btn" id="generate-report">Generate Report</button>
                    </div>
                </div>
                
                <div class="report-content" id="report-output">
                    <p>Select report type and date range, then click "Generate Report" to view your data.</p>
                </div>
            </div>

            <!-- Profile Section -->
            <div class="profile-section" id="profile-section">
                <div class="form-header">
                    <h3 class="form-title">User Profile</h3>
                </div>
                
                <div class="profile-header">
                    <div class="profile-avatar" id="profile-avatar">FP</div>
                    <div class="profile-info">
                        <h3 id="profile-farm-name">Fresh Poultry Farm</h3>
                        <span class="user-role" id="profile-role">Farm Manager</span>
                    </div>
                </div>
                
                <div class="profile-details">
                    <div class="detail-group">
                        <div class="detail-label">Farm Name</div>
                        <div class="detail-value" id="profile-farm-name-value">Fresh Poultry Farm</div>
                    </div>
                    
                    <div class="detail-group">
                        <div class="detail-label">Farm Owner</div>
                        <div class="detail-value" id="profile-owner-name">Rhoda Sakala</div>
                    </div>
                    
                    <div class="detail-group">
                        <div class="detail-label">Email Address</div>
                        <div class="detail-value" id="profile-email">Rhoda@freshpoultry.com</div>
                    </div>
                    
                    <div class="detail-group">
                        <div class="detail-label">Phone Number</div>
                        <div class="detail-value" id="profile-phone">+260 777974609</div>
                    </div>
                    
                    <div class="detail-group">
                        <div class="detail-label">Farm Location</div>
                        <div class="detail-value" id="profile-location">Rural County, Farm State</div>
                    </div>
                    
                    <div class="detail-group">
                        <div class="detail-label">Farm Size</div>
                        <div class="detail-value" id="profile-size">Medium (5,000 birds capacity)</div>
                    </div>
                    
                    <div class="detail-group">
                        <div class="detail-label">Member Since</div>
                        <div class="detail-value" id="profile-member-since">January 15, 2025</div>
                    </div>
                </div>
            </div>

            <!-- Flocks Section -->
            <div class="flocks-section">
                <div class="section-header">
                    <h3 class="section-title">My Flocks</h3>
                    <a href="#" class="view-all">View All</a>
                </div>
                
                <div class="flock-card">
                    <h4>Broiler-001</h4>
                    <p><strong>Location:</strong> House A | <strong>Birds:</strong> 500 | <strong>Age:</strong> 25 days</p>
                    <p><strong>Status:</strong> Healthy | <strong>Feed Type:</strong> Starter Mash</p>
                    <div class="quick-actions" style="margin-top: 10px;">
                        <button class="action-button" onclick="switchTab('metrics')">
                            <span>Record Metrics</span>
                        </button>
                        <button class="action-button" onclick="switchTab('health')">
                            <span>Record Health</span>
                        </button>
                    </div>
                </div>
                
                <div class="flock-card">
                    <h4>Layer-003</h4>
                    <p><strong>Location:</strong> House C | <strong>Birds:</strong> 300 | <strong>Age:</strong> 40 days</p>
                    <p><strong>Status:</strong> Healthy | <strong>Feed Type:</strong> Layer Pellets</p>
                    <div class="quick-actions" style="margin-top: 10px;">
                        <button class="action-button" onclick="switchTab('metrics')">
                            <span>Record Metrics</span>
                        </button>
                        <button class="action-button" onclick="switchTab('health')">
                            <span>Record Health</span>
                        </button>
                    </div>
                </div>
                
                <div class="flock-card">
                    <h4>Broiler-002</h4>
                    <p><strong>Location:</strong> House B | <strong>Birds:</strong> 450 | <strong>Age:</strong> 10 days</p>
                    <p><strong>Status:</strong> Healthy | <strong>Feed Type:</strong> Starter Mash</p>
                    <div class="quick-actions" style="margin-top: 10px;">
                        <button class="action-button" onclick="switchTab('metrics')">
                            <span>Record Metrics</span>
                        </button>
                        <button class="action-button" onclick="switchTab('health')">
                            <span>Record Health</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="quick-actions">
            <button class="action-button" onclick="switchTab('flock')">
                <span>Add New Flock</span>
            </button>
            <button class="action-button" onclick="switchTab('metrics')">
                <span>Record Metrics</span>
            </button>
            <button class="action-button" onclick="switchTab('health')">
                <span>Record Health</span>
            </button>
            <button class="action-button" onclick="switchTab('transaction')">
                <span>Record Transaction</span>
            </button>
            <button class="action-button" id="quick-report">
                <span>Generate Report</span>
            </button>
        </div>
    </div>

    <script>
        // Data storage for the application
        const appData = {
            flocks: [
                { id: 'broiler-001', type: 'broiler', size: 500, location: 'House A', startDate: '2023-05-15', source: 'Hatchery A', notes: 'Initial batch' },
                { id: 'layer-003', type: 'layer', size: 300, location: 'House C', startDate: '2023-04-20', source: 'Hatchery B', notes: 'Good production' },
                { id: 'broiler-002', type: 'broiler', size: 450, location: 'House B', startDate: '2023-06-10', source: 'Hatchery A', notes: 'New batch' }
            ],
            metrics: [],
            healthRecords: [],
            transactions: [],
            farmInfo: {
                name: "Fresh Poultry Farm",
                role: "manager"
            },
            userProfile: {
                farmName: "Fresh Poultry Farm",
                ownerName: "Rhoda Sakala",
                email: "Rhoda@freshpoultry.com",
                phone: "+260 777974609",
                location: "Rural County, Farm State",
                farmSize: "Medium (5,000 birds capacity)",
                memberSince: "January 15, 2025"
            }
        };

        // Set today's date as default for date fields
        document.addEventListener('DOMContentLoaded', function() {
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('start-date').value = today;
            document.getElementById('record-date').value = today;
            document.getElementById('health-date').value = today;
            document.getElementById('transaction-date').value = today;
            
            // Set default date range for reports (last 30 days)
            const startDate = new Date();
            startDate.setDate(startDate.getDate() - 30);
            document.getElementById('start-date-report').value = startDate.toISOString().split('T')[0];
            document.getElementById('end-date-report').value = today;
            
            // Load farm info from localStorage (would be set during signup)
            loadFarmInfo();
            
            // Set up task completion functionality
            setupTaskCompletion();
            
            // Set up notification bell
            setupNotifications();
            
            // Set up tab functionality
            setupTabs();
            
            // Set up form submissions
            setupFormSubmissions();
            
            // Set up report generation
            setupReportGeneration();
            
            // Set up sidebar navigation
            setupSidebarNavigation();
            
            // Set up logout functionality
            setupLogout();
        });
        
        // Load farm information from localStorage
        function loadFarmInfo() {
            const savedFarmInfo = localStorage.getItem('poultryProFarmInfo');
            const savedUserProfile = localStorage.getItem('poultryProUserProfile');
            
            if (savedFarmInfo) {
                appData.farmInfo = JSON.parse(savedFarmInfo);
            } else {
                // If no farm info exists, set a default (this would come from your signup form)
                appData.farmInfo = {
                    name: "Fresh Poultry Farm",
                    role: "manager"
                };
                // Save the default to localStorage
                localStorage.setItem('poultryProFarmInfo', JSON.stringify(appData.farmInfo));
            }
            
            if (savedUserProfile) {
                appData.userProfile = JSON.parse(savedUserProfile);
            } else {
                // If no user profile exists, set a default (this would come from your signup form)
                appData.userProfile = {
                    farmName: "Fresh Poultry Farm",
                    ownerName: "Rhoda Sakala",
                    email: "Rhoda@freshpoultry.com",
                    phone: "260 777974609",
                    location: "Rural County, Farm State",
                    farmSize: "Medium (5,000 birds capacity)",
                    memberSince: "January 15, 2025"
                };
                // Save the default to localStorage
                localStorage.setItem('poultryProUserProfile', JSON.stringify(appData.userProfile));
            }
            
            updateFarmDisplay();
            updateProfileDisplay();
        }
        
        // Update farm name and role display
        function updateFarmDisplay() {
            document.getElementById('display-farm-name').textContent = appData.farmInfo.name;
            document.getElementById('display-role').textContent = getRoleDisplayName(appData.farmInfo.role);
            
            // Update avatar with farm initials
            const farmInitials = appData.farmInfo.name
                .split(' ')
                .map(word => word.charAt(0))
                .join('')
                .toUpperCase()
                .substring(0, 2);
            document.getElementById('farm-avatar').textContent = farmInitials;
        }
        
        // Update profile display
        function updateProfileDisplay() {
            document.getElementById('profile-farm-name').textContent = appData.userProfile.farmName;
            document.getElementById('profile-role').textContent = getRoleDisplayName(appData.farmInfo.role);
            document.getElementById('profile-farm-name-value').textContent = appData.userProfile.farmName;
            document.getElementById('profile-owner-name').textContent = appData.userProfile.ownerName;
            document.getElementById('profile-email').textContent = appData.userProfile.email;
            document.getElementById('profile-phone').textContent = appData.userProfile.phone;
            document.getElementById('profile-location').textContent = appData.userProfile.location;
            document.getElementById('profile-size').textContent = appData.userProfile.farmSize;
            document.getElementById('profile-account-type').textContent = appData.userProfile.accountType;
            document.getElementById('profile-member-since').textContent = appData.userProfile.memberSince;
            
            // Update profile avatar with farm initials
            const farmInitials = appData.userProfile.farmName
                .split(' ')
                .map(word => word.charAt(0))
                .join('')
                .toUpperCase()
                .substring(0, 2);
            document.getElementById('profile-avatar').textContent = farmInitials;
        }
        
        // Get display name for role
        function getRoleDisplayName(role) {
            const roleMap = {
                'owner': 'Farm Owner',
                'manager': 'Farm Manager',
                'worker': 'Farm Worker'
            };
            return roleMap[role] || 'Farm User';
        }
        
        // Sidebar navigation functionality
        function setupSidebarNavigation() {
            const sidebarLinks = document.querySelectorAll('.sidebar-menu a');
            
            sidebarLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Remove active class from all links
                    sidebarLinks.forEach(l => l.classList.remove('active'));
                    
                    // Add active class to clicked link
                    this.classList.add('active');
                    
                    const target = this.getAttribute('data-target');
                    
                    // Navigate to the corresponding section
                    switch(target) {
                        case 'dashboard':
                            // Scroll to top of dashboard
                            window.scrollTo({ top: 0, behavior: 'smooth' });
                            break;
                        case 'flocks':
                            // Navigate to Add Flock form
                            switchTab('flock');
                            break;
                        case 'health':
                            // Navigate to Record Health form
                            switchTab('health');
                            break;
                        case 'reports':
                            // Scroll to reports section
                            document.querySelector('.report-section').scrollIntoView({ behavior: 'smooth' });
                            break;
                        case 'profile':
                            // Show profile section
                            showProfileSection();
                            break;
                        case 'logout':
                            // Show logout confirmation
                            showLogoutModal();
                            break;
                    }
                });
            });
        }
        
        // Show profile section
        function showProfileSection() {
            // Hide all tab contents
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.remove('active');
            });
            
            // Hide other sections
            document.querySelector('.report-section').style.display = 'none';
            document.querySelector('.flocks-section').style.display = 'none';
            
            // Show profile section
            document.getElementById('profile-section').style.display = 'block';
            
            // Scroll to profile section
            document.getElementById('profile-section').scrollIntoView({ behavior: 'smooth' });
        }
        
        // Logout functionality
        function setupLogout() {
            const logoutModal = document.getElementById('logout-modal');
            const cancelLogoutBtn = document.getElementById('cancel-logout');
            const confirmLogoutBtn = document.getElementById('confirm-logout');
            
            // Cancel logout
            cancelLogoutBtn.addEventListener('click', function() {
                logoutModal.style.display = 'none';
            });
            
            // Confirm logout
            confirmLogoutBtn.addEventListener('click', function() {
                performLogout();
            });
            
            // Close modal when clicking outside
            window.addEventListener('click', function(event) {
                if (event.target === logoutModal) {
                    logoutModal.style.display = 'none';
                }
            });
        }
        
        // Show logout confirmation modal
        function showLogoutModal() {
            document.getElementById('logout-modal').style.display = 'flex';
        }
        
        // Perform logout
        function performLogout() {
            // Clear user data from localStorage
            localStorage.removeItem('poultryProFarmInfo');
            localStorage.removeItem('poultryProUserProfile');
            localStorage.removeItem('poultryProFlocks');
            localStorage.removeItem('poultryProMetrics');
            localStorage.removeItem('poultryProHealthRecords');
            localStorage.removeItem('poultryProTransactions');
            
            // In a real application, you would redirect to login page
            // For this demo, we'll show a message and reload the page
            alert('You have been logged out successfully. Redirecting to login page...');
            
            // In a real application, you would redirect to your login page
            // window.location.href = 'login.php';
            
            // For this demo, we'll just reload the page to simulate logout
            location.reload();
        }
        
        // Tab functionality
        function setupTabs() {
            const tabs = document.querySelectorAll('.tab');
            tabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    const tabId = this.getAttribute('data-tab');
                    switchTab(tabId);
                });
            });
        }
        
        function switchTab(tabId) {
            // Hide profile section when switching tabs
            document.getElementById('profile-section').style.display = 'none';
            
            // Show other sections
            document.querySelector('.report-section').style.display = 'block';
            document.querySelector('.flocks-section').style.display = 'block';
            
            // Deactivate all tabs
            document.querySelectorAll('.tab').forEach(tab => {
                tab.classList.remove('active');
            });
            
            // Deactivate all tab contents
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.remove('active');
            });
            
            // Activate selected tab
            document.querySelector(`.tab[data-tab="${tabId}"]`).classList.add('active');
            document.getElementById(`${tabId}-tab`).classList.add('active');
            
            // Scroll to the form
            document.getElementById(`${tabId}-tab`).scrollIntoView({behavior: 'smooth'});
        }
        
        // Form submission handlers
        function setupFormSubmissions() {
            // Flock form
            document.getElementById('flock-form').addEventListener('submit', function(e) {
                e.preventDefault();
                
                const flockId = document.getElementById('flock-id').value;
                const flockType = document.getElementById('flock-type').value;
                const flockSize = document.getElementById('flock-size').value;
                const location = document.getElementById('location').value;
                const startDate = document.getElementById('start-date').value;
                const source = document.getElementById('source').value;
                const notes = document.getElementById('notes').value;
                
                // Add to data storage
                appData.flocks.push({
                    id: flockId,
                    type: flockType,
                    size: parseInt(flockSize),
                    location: location,
                    startDate: startDate,
                    source: source,
                    notes: notes
                });
                
                alert(`Flock ${flockId} (${flockType}) with ${flockSize} birds has been added successfully!`);
                
                // Reset the form
                this.reset();
                document.getElementById('start-date').value = new Date().toISOString().split('T')[0];
                
                // Update the flocks dropdown in other forms
                updateFlockSelects();
                
                // Refresh flocks display
                refreshFlocksDisplay();
            });
            
            // Metrics form
            document.getElementById('metrics-form').addEventListener('submit', function(e) {
                e.preventDefault();
                
                const flockSelect = document.getElementById('flock-select').value;
                const recordDate = document.getElementById('record-date').value;
                const mortality = document.getElementById('mortality').value || 0;
                const feedConsumption = document.getElementById('feed-consumption').value || 0;
                const eggProduction = document.getElementById('egg-production').value || 0;
                const waterConsumption = document.getElementById('water-consumption').value || 0;
                const healthNotes = document.getElementById('health-notes').value;
                
                // Add to data storage
                appData.metrics.push({
                    flockId: flockSelect,
                    date: recordDate,
                    mortality: parseInt(mortality),
                    feedConsumption: parseFloat(feedConsumption),
                    eggProduction: parseInt(eggProduction),
                    waterConsumption: parseFloat(waterConsumption),
                    healthNotes: healthNotes
                });
                
                alert(`Metrics recorded for ${flockSelect} on ${recordDate}`);
                
                // Reset the form
                this.reset();
                document.getElementById('record-date').value = new Date().toISOString().split('T')[0];
            });
            
            // Health form
            document.getElementById('health-form').addEventListener('submit', function(e) {
                e.preventDefault();
                
                const healthFlock = document.getElementById('health-flock').value;
                const healthDate = document.getElementById('health-date').value;
                const disease = document.getElementById('disease').value;
                const affectedCount = document.getElementById('affected-count').value || 0;
                const treatment = document.getElementById('treatment').value;
                const vetName = document.getElementById('vet-name').value;
                const healthNotes = document.getElementById('health-notes').value;
                
                // Add to data storage
                appData.healthRecords.push({
                    flockId: healthFlock,
                    date: healthDate,
                    disease: disease,
                    affectedCount: parseInt(affectedCount),
                    treatment: treatment,
                    vetName: vetName,
                    notes: healthNotes
                });
                
                alert(`Health data recorded for ${healthFlock} on ${healthDate}`);
                
                // Reset the form
                this.reset();
                document.getElementById('health-date').value = new Date().toISOString().split('T')[0];
            });
            
            // Transaction form
            document.getElementById('transaction-form').addEventListener('submit', function(e) {
                e.preventDefault();
                
                const transactionType = document.getElementById('transaction-type').value;
                const transactionDate = document.getElementById('transaction-date').value;
                const amount = document.getElementById('amount').value;
                const category = document.getElementById('category').value;
                const description = document.getElementById('description').value;
                const transactionNotes = document.getElementById('transaction-notes').value;
                
                // Add to data storage
                appData.transactions.push({
                    type: transactionType,
                    date: transactionDate,
                    amount: parseFloat(amount),
                    category: category,
                    description: description,
                    notes: transactionNotes
                });
                
                alert(`Transaction recorded: ${transactionType} of $${amount} for ${description}`);
                
                // Reset the form
                this.reset();
                document.getElementById('transaction-date').value = new Date().toISOString().split('T')[0];
            });
        }
        
        // Update flock selects in all forms
        function updateFlockSelects() {
            const flockSelects = [
                document.getElementById('flock-select'),
                document.getElementById('health-flock')
            ];
            
            flockSelects.forEach(select => {
                // Clear existing options (except the first one)
                while(select.options.length > 1) {
                    select.remove(1);
                }
                
                // Add flocks from data
                appData.flocks.forEach(flock => {
                    const option = document.createElement('option');
                    option.value = flock.id;
                    option.textContent = `${flock.id} (${flock.type})`;
                    select.appendChild(option);
                });
            });
        }
        
        // Refresh flocks display
        function refreshFlocksDisplay() {
            // In a real app, this would update the UI with the new flock data
            console.log('Flocks updated:', appData.flocks);
        }
        
        // Report generation
        function setupReportGeneration() {
            document.getElementById('generate-report').addEventListener('click', generateReport);
            document.getElementById('quick-report').addEventListener('click', function() {
                switchTab('flock'); // Just scroll to the report section
                generateReport();
            });
        }
        
        function generateReport() {
            const reportType = document.getElementById('report-type').value;
            const startDate = document.getElementById('start-date-report').value;
            const endDate = document.getElementById('end-date-report').value;
            
            let reportHTML = '';
            
            switch(reportType) {
                case 'flocks':
                    reportHTML = generateFlocksReport();
                    break;
                case 'metrics':
                    reportHTML = generateMetricsReport(startDate, endDate);
                    break;
                case 'health':
                    reportHTML = generateHealthReport(startDate, endDate);
                    break;
                case 'financial':
                    reportHTML = generateFinancialReport(startDate, endDate);
                    break;
                case 'comprehensive':
                    reportHTML = generateComprehensiveReport(startDate, endDate);
                    break;
            }
            
            document.getElementById('report-output').innerHTML = reportHTML;
        }
        
        function generateFlocksReport() {
            let html = '<h3>Flocks Summary Report</h3>';
            html += '<table class="report-table">';
            html += '<tr><th>Flock ID</th><th>Type</th><th>Size</th><th>Location</th><th>Start Date</th></tr>';
            
            appData.flocks.forEach(flock => {
                html += `<tr>
                    <td>${flock.id}</td>
                    <td>${flock.type}</td>
                    <td>${flock.size}</td>
                    <td>${flock.location}</td>
                    <td>${flock.startDate}</td>
                </tr>`;
            });
            
            html += '</table>';
            return html;
        }
        
        function generateMetricsReport(startDate, endDate) {
            let html = '<h3>Production Metrics Report</h3>';
            html += `<p>Date Range: ${startDate} to ${endDate}</p>`;
            html += '<table class="report-table">';
            html += '<tr><th>Date</th><th>Flock</th><th>Mortality</th><th>Feed (kg)</th><th>Eggs</th><th>Water (L)</th></tr>';
            
            const filteredMetrics = appData.metrics.filter(metric => {
                return metric.date >= startDate && metric.date <= endDate;
            });
            
            if (filteredMetrics.length === 0) {
                html += '<tr><td colspan="6" style="text-align: center;">No metrics recorded in this date range</td></tr>';
            } else {
                filteredMetrics.forEach(metric => {
                    html += `<tr>
                        <td>${metric.date}</td>
                        <td>${metric.flockId}</td>
                        <td>${metric.mortality}</td>
                        <td>${metric.feedConsumption}</td>
                        <td>${metric.eggProduction}</td>
                        <td>${metric.waterConsumption}</td>
                    </tr>`;
                });
            }
            
            html += '</table>';
            return html;
        }
        
        function generateHealthReport(startDate, endDate) {
            let html = '<h3>Health Records Report</h3>';
            html += `<p>Date Range: ${startDate} to ${endDate}</p>`;
            html += '<table class="report-table">';
            html += '<tr><th>Date</th><th>Flock</th><th>Disease/Observation</th><th>Affected</th><th>Treatment</th></tr>';
            
            const filteredHealth = appData.healthRecords.filter(record => {
                return record.date >= startDate && record.date <= endDate;
            });
            
            if (filteredHealth.length === 0) {
                html += '<tr><td colspan="5" style="text-align: center;">No health records in this date range</td></tr>';
            } else {
                filteredHealth.forEach(record => {
                    html += `<tr>
                        <td>${record.date}</td>
                        <td>${record.flockId}</td>
                        <td>${record.disease}</td>
                        <td>${record.affectedCount}</td>
                        <td>${record.treatment}</td>
                    </tr>`;
                });
            }
            
            html += '</table>';
            return html;
        }
        
        function generateFinancialReport(startDate, endDate) {
            let html = '<h3>Financial Summary Report</h3>';
            html += `<p>Date Range: ${startDate} to ${endDate}</p>`;
            html += '<table class="report-table">';
            html += '<tr><th>Date</th><th>Type</th><th>Category</th><th>Description</th><th>Amount</th></tr>';
            
            const filteredTransactions = appData.transactions.filter(transaction => {
                return transaction.date >= startDate && transaction.date <= endDate;
            });
            
            if (filteredTransactions.length === 0) {
                html += '<tr><td colspan="5" style="text-align: center;">No transactions in this date range</td></tr>';
            } else {
                let totalIncome = 0;
                let totalExpense = 0;
                
                filteredTransactions.forEach(transaction => {
                    const amount = transaction.type === 'income' ? transaction.amount : -transaction.amount;
                    const amountDisplay = transaction.type === 'income' ? `$${transaction.amount}` : `-$${transaction.amount}`;
                    
                    html += `<tr>
                        <td>${transaction.date}</td>
                        <td>${transaction.type}</td>
                        <td>${transaction.category}</td>
                        <td>${transaction.description}</td>
                        <td>${amountDisplay}</td>
                    </tr>`;
                    
                    if (transaction.type === 'income') {
                        totalIncome += transaction.amount;
                    } else {
                        totalExpense += transaction.amount;
                    }
                });
                
                html += '</table>';
                html += `<div style="margin-top: 20px; padding: 15px; background: #e8f5e9; border-radius: 5px;">`;
                html += `<p><strong>Total Income:</strong> $${totalIncome.toFixed(2)}</p>`;
                html += `<p><strong>Total Expenses:</strong> $${totalExpense.toFixed(2)}</p>`;
                html += `<p><strong>Net Profit/Loss:</strong> $${(totalIncome - totalExpense).toFixed(2)}</p>`;
                html += `</div>`;
            }
            
            return html;
        }
        
        function generateComprehensiveReport(startDate, endDate) {
            return `
                <h3>Comprehensive Farm Report</h3>
                <p>Date Range: ${startDate} to ${endDate}</p>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div>
                        <h4>Flocks Summary</h4>
                        ${generateFlocksReport().replace('<h3>Flocks Summary Report</h3>', '')}
                    </div>
                    <div>
                        <h4>Financial Summary</h4>
                        ${generateFinancialReport(startDate, endDate).replace('<h3>Financial Summary Report</h3>', '')}
                    </div>
                </div>
                <div style="margin-top: 20px;">
                    <h4>Production Metrics</h4>
                    ${generateMetricsReport(startDate, endDate).replace('<h3>Production Metrics Report</h3>', '')}
                </div>
                <div style="margin-top: 20px;">
                    <h4>Health Records</h4>
                    ${generateHealthReport(startDate, endDate).replace('<h3>Health Records Report</h3>', '')}
                </div>
            `;
        }
        
        // Task completion functionality
        function setupTaskCompletion() {
            const checkboxes = document.querySelectorAll('.task-checkbox input');
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const taskItem = this.closest('.task-item');
                    if(this.checked) {
                        taskItem.style.opacity = '0.6';
                        taskItem.style.textDecoration = 'line-through';
                    } else {
                        taskItem.style.opacity = '1';
                        taskItem.style.textDecoration = 'none';
                    }
                });
            });
        }
        
        
        
        
        // Initialize flock selects
        updateFlockSelects();
    </script>
</body>
</html>