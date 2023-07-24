<?php
namespace Tests\Unit;

use App\Helpers\TeHelper;
use App\Models\Job;
// use App\Models\Language;
use App\Models\User;
use App\Models\UserMeta;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;

class TeHelperTest extends TestCase
{
    use RefreshDatabase;
    
    public function testWillExpireAt()
    {
        $dueTime = Carbon::now()->addHours(20);
        $createdAt = Carbon::now();

        // Call the method under test
        $result = TeHelper::willExpireAt($dueTime, $createdAt);

        // Assert the result
        $this->assertInstanceOf(Carbon::class, $result);
        $this->assertEquals($dueTime, $result);
    }
}
