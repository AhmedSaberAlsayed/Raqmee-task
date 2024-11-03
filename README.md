# Project Name

Brief description of the project and its purpose.

## Requirements

- PHP >= 8.0
- Composer
- MySQL or other database
- Node.js and npm (for frontend assets)

## Installation

Follow these steps to set up the project on your local machine.

### 1. Clone the Repository

Clone the repository to your local machine:

```bash
 git clone https://github.com/AhmedSaberAlsayed/Raqmee-task.git
```


### 2. Install Dependencies
    composer install
    npm install

### 3. Set Up Environment Configuration
    Copy the .env.example file to .env:

### 4. Generate an application key:
    php artisan key:generate

### 5. Run Migrations the Database
    php artisan migrate
### 6. Compile Frontend Assets 
    npm run dev        
### 7. Start the Local Development Server
    php artisan serve
