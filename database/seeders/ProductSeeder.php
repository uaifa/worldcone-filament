<?php

namespace Database\Seeders;

use App\Enum\AttendingStatus;
use App\Enum\ProductFlag;
use App\Enum\WSFSStatus;
use App\Models\Product;
use App\Models\ProductDependency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $wsfs = Product::create([
            'title' => 'Full WSFS Membership',
            'description' => 'WSFS Membership',
            'price' => 45.00,
            'attending_status' => AttendingStatus::Not_attending,
      
            'available_from' => '2022-09-04',
            'available_to' => '2024-08-12',
      
            'is_public' => 1,
            'status' => 1,
      
            'requires_fullname' => ProductFlag::Required,
            'requires_preferred_name' => ProductFlag::Optional,
            'requires_dob' => ProductFlag::Hidden,
            'requires_email' => ProductFlag::Required,
            'requires_email_alternate' => ProductFlag::Hidden,
            'requires_country' => ProductFlag::Required,
          ]);
      
          $p1 = Product::create([
            'title' => 'Adult Virtual Attendee',
            'description' => 'Full Virtual attendance for all 5 days of the convention.',
            'price' => 65.00,
            'attending_days' => '2024-08-13,2024-08-14,2024-08-15,2024-08-16,2024-08-17',
            'attending_status' => AttendingStatus::Virtual,
            'age_at_con_min' => 26,
            'available_from' => '2023-05-01',
            'available_to' => '2024-08-12',
      
            'is_public' => 1,
            'status' => 1,
            'required_wsfs_status' => WSFSStatus::Vote_and_nominate,
      
            'requires_fullname' => ProductFlag::Required,
            'requires_preferred_name' => ProductFlag::Optional,
            'requires_dob' => ProductFlag::Hidden,
            'requires_email' => ProductFlag::Required,
            'requires_email_alternate' => ProductFlag::Hidden,
            'requires_country' => ProductFlag::Required,
          ]);
      
          ProductDependency::create([
            'product_id' => $p1->id,
            'required_product_id' => $wsfs->id
          ]);
      
          $p2 = Product::create([
            'title' => 'Young Adult Full Attending',
            'description' => 'Full attendance for all 5 days of the convention.',
            'price' => 65.00,
            'attending_days' => '2024-08-13,2024-08-14,2024-08-15,2024-08-16,2024-08-17',
            'attending_status' => AttendingStatus::In_person,
            'age_at_con_min' => 16,
            'age_at_con_max' => 25,
            'available_from' => '2023-05-01',
            'available_to' => '2024-08-12',
      
            'is_public' => 1,
            'status' => 1,
            'required_wsfs_status' => WSFSStatus::Vote_and_nominate,
      
            'requires_fullname' => ProductFlag::Required,
            'requires_preferred_name' => ProductFlag::Optional,
            'requires_dob' => ProductFlag::Required,
            'requires_email' => ProductFlag::Required,
            'requires_email_alternate' => ProductFlag::Hidden,
            'requires_country' => ProductFlag::Required,
          ]);
      
          ProductDependency::create([
            'product_id' => $p2->id,
            'required_product_id' => $wsfs->id
          ]);
      
      
          $p3 = Product::create([
            'title' => 'Scottish/Local Full Attending',
            'description' => 'Full attendance for all 5 days of the convention.',
            'price' => 80.00,
            'attending_days' => '2024-08-13,2024-08-14,2024-08-15,2024-08-16,2024-08-17',
            'attending_status' => AttendingStatus::In_person,
            'age_at_con_min' => 26,
            'available_from' => '2023-05-01',
            'available_to' => '2024-08-12',
      
            'is_public' => 1,
            'status' => 1,
            'required_wsfs_status' => WSFSStatus::Vote_and_nominate,
      
            'requires_fullname' => ProductFlag::Required,
            'requires_preferred_name' => ProductFlag::Optional,
            'requires_dob' => ProductFlag::Required,
            'requires_email' => ProductFlag::Required,
            'requires_email_alternate' => ProductFlag::Optional,
            'requires_street' => ProductFlag::Required,
            'requires_city' => ProductFlag::Required,
            'requires_state' => ProductFlag::Required,
            'requires_country' => ProductFlag::Required,
          ]);
      
          ProductDependency::create([
            'product_id' => $p3->id,
            'required_product_id' => $wsfs->id
          ]);
      
      
          Product::create([
            'title' => 'Teen Thursday Attending',
            'description' => 'Attendance for 1 day of the convention.',
            'price' => 20.00,
            'attending_days' => '2024-08-13',
            'attending_status' => AttendingStatus::In_person,
            'age_at_con_min' => 11,
            'age_at_con_max' => 15,
            'available_from' => '2024-03-01',
            'available_to' => '2024-08-08',
      
            'is_public' => 1,
            'status' => 1,
            'required_wsfs_status' => WSFSStatus::None,
      
            'requires_fullname' => ProductFlag::Required,
            'requires_preferred_name' => ProductFlag::Optional,
            'requires_dob' => ProductFlag::Hidden,
            'requires_email' => ProductFlag::Required,
            'requires_email_alternate' => ProductFlag::Hidden,
            'requires_country' => ProductFlag::Required,
          ]);
    }
}
