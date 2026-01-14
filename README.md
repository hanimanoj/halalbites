# Halal Bites Gombak

# Halal Bites Gombak - Halal Certificate Outlets area Gombak

## Group Information

**Group Name**: nuggetz
**Section**: 5

**Group Members** :
- NUR ADRIANA KARMILA BINTI NASHARUDDIN - 2312298
- AINUL HANI BINTI MOHD MANOJ - 2314784
- PUTERI NUR IMAN ADRIENNA BINTI MUHAMMAD HAFIDZ - 2316278
- NURHIDAYU BINTI ZULKIFLI - 2316978

## Project Overview

Introduction :
Halal Bites Gombak is a proposed web-based application designed to help users discover halal-certified food and beverage outlets in the Gombak area. The platform provides verified halal information based on official JAKIM certification, including certificate details, outlet descriptions, and location support. With features such as category-based browsing and an integrated map view, Halal Bites Gombak aims to improve accessibility, transparency, and user confidence when making halal-conscious dining choices.

## Project Objectives

- Primary Goal: Provide a reliable and centralized directory of halal-certified F&B outlets in the Gombak area based on verified JAKIM certification data.
- Information Transparency Goal: Enhance user confidence by displaying clear and accurate halal certification details, including serial numbers, certification status, and validity periods.
- User Experience Goal: Improve accessibility and convenience through a responsive interface with category-based browsing for both desktop and mobile users.
- Navigation Support Goal: Assist users in locating and choosing outlets by integrating an interactive map view with location and direction features.
- Community & Business Goal: Promote awareness of halal-certified establishments and support local businesses by increasing visibility and fostering community trust.

## Target Users

- General Users: Individuals seeking reliable halal-certified food and beverage outlets in the Gombak area.
- Muslim Consumers: Users who prioritize verified halal information when making dining decisions.
- Foreigners: International visitors or non-local users who require clear, trustworthy halal food information to help them find suitable dining options while staying in the Gombak area.

## Features and Functionalities

** Customer Features**

- User Registration & Login: Secure account creation and authentication
- Outlet Browsing: View a directory of halal-certified food and beverage outlets in the Gombak area
- Category Filtering: Browse outlets based on food categories for easier selection
- Search Function: Search outlets by name or keywords
- Halal Certification Details: View verified JAKIM halal certificate information including serial number and expiry date
- Map View & Navigation: View outlet locations through an integrated interactive map
- Bookmark Outlets: Save favourite outlets using the bookmark feature
- Saved Page: Access a list of bookmarked outlets for future reference
- Responsive Interface: Optimized viewing experience on desktop and mobile devices

##  Technical Implementation

** Technology Stack **

Backend Framework: Laravel 12.44.0
Frontend: Blade Templates with Custom CSS 
Image Management: Public Directory Assets
Database: MYSQL 8.0
Authentication: Laravel Breeze
Development Environment: XAMPP

** Database Design **

Database Schema Overview
Our database schema is designed using Laravel migrations and consists of several core tables that support user management, directory listing, location data and bookmarking functionality.

Core Tables: 

Users → Registered user information including name, email, password, phone number and location
Categories → Classify and organize food establishments for each category
Brands → Information about halal food businesses
Locations → Stores address information for each brand
Saved pages → Allowing to save favourites brand for later reference


## Entity Relationship Diagram (ERD)

https://docs.google.com/document/d/18D3RzprQAWfc_asWuMPRowEEN0xdfrNPirWR-ndoPxU/edit?tab=t.0#heading=h.s0addzvv3j21

Key Relationships:

- Users saved many brands and one brands can saved by many users (Many-to-Many)
- Categories has many brands (One-to-Many)
- User can performs many searches (One-to-Many)
- A brand can be saved by many users (One-to-Many)


### Laravel Components Implementations 

- Routes (web.php)

php
'// Homepage Routes'
Route::get('/', function () {
    return view('welcome');
})->name('home');

'// Directory Routes'
Route::get('/directory', [DirectoryController::class, 'index'])->name('directory.index');
Route::get('/directory/category/{slug}', [DirectoryController::class, 'category'])->name('directory.category');
Route::get('/directory/{brand:slug}', [DirectoryController::class, 'show'])->name('directory.show');

'// Saved Routes'
Route::get('/saved', [SavedController::class, 'index'])->name('saved-pages');
Route::post('/saved/{brand}', [SavedController::class, 'store'])->name('saved.store');
Route::delete('/saved/{id}', [SavedController::class, 'destroy'])->name('saved.destroy');

'// Settings Routes'
Route::get('/settings', function () {return view('settings'); })->name('settings');

Route::post('/settings/toggle', function (Request $request) {
    session(['dark_mode' => $request->has('dark_mode'),]);
        return redirect()->back(); })->name('toggle.mode');

Route::post('/settings/language-toggle', function (Request $request) {
    session(['locale' => $request->has('language') ? 'ms' : 'en',]);
        return redirect()->back();})->name('language.toggle');

Route::post('/settings/permission', [SettingsController::class, 'savePermission'])->name('settings.permission');

'// Authentication Routes'
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/signup', [AuthController::class, 'showSignup'])->name('signup');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup.submit');

'// Profile Routes'
Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
Route::get('/profile/edit', [AuthController::class, 'editProfile'])->name('profile.edit');
Route::post('/profile/update', [AuthController::class, 'updateProfile'])->name('profile.update');

'// Logout Routes'
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

'// Brand Routes'
Route::post('/brand/{brand}/toggle-save', [BrandController::class, 'toggleSave'])->name('brand.toggleSave');

'// Search Routes'
Route::get('/directory/search', [DirectoryController::class, 'search'])->name('directory.search');
Route::get('/search/live', [DirectoryController::class, 'liveSearch']);


- Controllers

    *Main Controllers Implemented are below:*

    1. AuthController: Manages all user authentication processes, ensuring secure access to the system
    2. HomeController: Handles homepage display and details about the website 
    3. DirectoryController: Handles the display, management of the brand directory and filtering brands by category
    4. BrandController: Manages brand-related operations by listing all brands and displaying detailed information for selected brands
    5. SavedController: Handles the functionality for saving favourites brands for future references
    6. SettingsController: Manages user preferences and profile information


- Models and Relationship

php
// User Model
	
class User extends Authenticatable
{
    use HasFactory, Notifiable;

protected $fillable = ['name','email','password',];

protected $hidden = ['password','remember_token',];

protected function casts(): array
    {
        return ['email_verified_at' => 'datetime','password' => 'hashed',];
    }

public function savedBrands()
    {   
        return $this->belongsToMany(Brand::class, 'saved_brands')
                ->withTimestamps();
    }
}

// Brand Model

class Brand extends Model
{
    protected $fillable = ['name','company_name','operating_hour','jakim_ref_no','expiry_year','category_id',];
    
public function category()
    {
        return $this->belongsTo(Category::class);
    }

public function locations()
    {
        return $this->hasMany(Location::class);
    }

public function getHalalStatusAttribute()
    {
        return $this->expiry_year >= now()->year
            ? 'Active'
            : 'Expired';
    }

public function getRouteKeyName()
    {
        return 'slug';
    }

public function savedPages()
    {
        return $this->hasMany(SavedPage::class);
    }
}

// Category Model

class Category extends Model
{
    protected $fillable = ['name'];
    
public function brands()
    {
        return $this->hasMany(Brand::class);
    }
}

// Location Model

class Location extends Model
{
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
}

// Place Model

class Place extends Model
{
    //
}

// SavedPage Model

class SavedPage extends Model
{
    protected $fillable = ['brand_id'];

public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}


- Views and User Interface

    *Blade Templates Structure:*

    - layouts/app.blade.php - Main application layout 
    - signup.blade.php - Displays the registration to create an account
    - login.blade.php - Enter their credentials to access to the system
    - header.blade.php - Displays logo, navigation bar, search button, setting and account that appear on all pages
    - footer.blade.php - Displays copyright information and social media platform
    - profile.blade.php - Provide user's information
    - edit-profile.blade.php - Update user's information
    - settings.blade.php - Manages account preferences
    - details.blade.php - Displays detailed information for a selected brands
    - welcome.blade.php - Homepage that display details information about the websites
    - directory/index.blade.php - Shows all directory of the brands
    - sidebar.blade.php - navigation that separates brands by categories
    - directory/search-results.blade.php - Displays search results 
    - saved-pages.blade.php - Shows the favourite brands 

    *Design Features:*
    - Responsive Design: The website uses a mobile-first approach with Tailwind CSS and custom layouts
    - Color Scheme: A maroon, soft pink and white palette giving a modern and clean appearance
    - Navigation: Intuitive menu and sidebar structure with user role-based options
    - Interactive Elements:  Saved brands, perform live searches and view dynamic details for the brands
 
## User Authentication System

### Authentication Features

* User login using username and password
* Session-based authentication
* User profile viewing and editing
* Secure logout functionality
* Saved items linked to authenticated users

### Security Measures

* Password hashing using Laravel Hash
* Input validation for login and profile update forms
* Session handling to prevent unauthorized access
* Logout clears active user sessions
* Protection against invalid or empty inputs

### Installation & Setup Instructions

* PHP, Composer, Laravel, and MySQL required
* Dependencies managed using Composer
* Environment configuration via `.env` file
* Database connection setup required
* Laravel built-in server used for deployment

### Step-by-Step Installation

* Clone or extract the project repository
* Run `composer install`
* Copy `.env.example` to `.env`
* Configure database credentials in `.env`
* Run `php artisan key:generate`
* Run `php artisan migrate`
* Start the application using `php artisan serve`
* Access the system through a web browser

## Testing & Quality Assurance

### Functionality Testing

* Verified login with valid credentials
* Tested login rejection with invalid credentials
* Confirmed profile updates save correctly
* Ensured logout ends user session
* Verified authenticated access to saved items

### Browser Compatibility

* Tested on Google Chrome
* Tested on Mozilla Firefox
* Tested on Microsoft Edge
* Responsive layout works on different screen sizes

### Performance Testing

* Fast page load time for main pages
* Smooth search and filtering operations
* Efficient session handling
* Optimized database queries using Laravel ORM

## Challenges & Solutions

### Challenges

* Managing user authentication flow
* Preventing unauthorized access to pages
* Ensuring password security
* Handling form validation errors
* Database migration conflicts

### Solutions

* Implemented Laravel authentication features
* Added access control checks in controllers
* Used Laravel password hashing
* Applied proper request validation
* Fixed schema issues and re-ran migrations



# Future Enhancements
### Phase 2 Features (Potential Improvements)
- User Rating & Review System : Allow users to rate and review halal food outlets and the system itself based on their experience.
- Multilingual Content Expansion : Support more languages for broader user accessibility.
- Student Budget Mode : Special filter for affordable meals around Gombak
- Peak Hour & Popularity Insights : Show estimated busy hours based on user visits and interactions.
- Temporary Closure Alerts : Notify users when outlets close due to hygiene, rennovation or halal issues.


### Scalability Considerations

- Database Optimization: Improve query efficiency to handle a growing number of food listings
- Caching Implementation: Use caching to enhance performance and reduce server load
- Load Management: Prepare the system to handle increased user traffic



## Learning Outcomes
### Technical Skills Gained

- Web Application Development: Building a full-stack system using Laravel as the backend framework.
- Relational Database Management: Structuring and managing interconnected data efficiently.
- Authentication System : Implementing secure user login and role-based access control
- Source Code Management: Applying version control practices for collaborative development.

### Soft Skills Developed

- Communication Skills: Coordinating tasks and discussing solutions with team members.
- Time Management: Completing project milestones within set deadlines.
- Analytical Thinking: Identifying issues and evaluating suitable technical solutions.

## Conclusion
Halal Bites Gombak represents a practical implementation of a halal food discovery platform designed to support users in locating halal dining options within the Gombak area. The project reflects the effective application of web development concepts and structured system design.

### Key Achievements

- Successfully implemented all required Laravel components (Routes, Controllers, Views, Models)
- Successfully designed and developed a location-based halal food discovery platform
- Implemented structured data management with full CRUD functionality
- Integrated user authentication feature
- Ensured system stability and maintainability through proper coding practices


### Project Impact
This project enhances practical understanding of real-world web application development while promoting teamwork and problem-solving skills. The experience gained from developing Halal Bites Gombak provides a strong foundation for future software development projects and industry applications.

- Project Completion Date: 16/11/2025
- Course: INFO 3305 Web Application Development


