<?php
// src/Blogger/BlogBundle/Tests/Twig/Extensions/BloggerBlogExtensionTest.php

namespace Blogger\BlogBundle\Tests\Twig\Extensions;

use Blogger\BlogBundle\Twig\Extensions\BloggerBlogExtension;

class BloggerBlogExtension extends \Twig_Extension
{
    public function createdAgo(\DateTime $dateTime)
    {

        if ($delta < 60)
        {
            // Seconds
            $time = $delta;
            $duration = $time . " second" . (($time === 0 || $time > 1) ? "s" : "") . " ago";
        }
        else if ($delta < 3600)
        {
            // Mins
            $time = floor($delta / 60);
            $duration = $time . " minute" . (($time > 1) ? "s" : "") . " ago";
        }
        else if ($delta < 86400)
        {
            // Hours
            $time = floor($delta / 3600);
            $duration = $time . " hour" . (($time > 1) ? "s" : "") . " ago";
        }

        $blog = new BloggerBlogExtension();

        $this->assertEquals("0 seconds ago", $blog->createdAgo(new \DateTime()));
        $this->assertEquals("34 seconds ago", $blog->createdAgo($this->getDateTime(-34)));
        $this->assertEquals("1 minute ago", $blog->createdAgo($this->getDateTime(-60)));
        $this->assertEquals("2 minutes ago", $blog->createdAgo($this->getDateTime(-120)));
        $this->assertEquals("1 hour ago", $blog->createdAgo($this->getDateTime(-3600)));
        $this->assertEquals("1 hour ago", $blog->createdAgo($this->getDateTime(-3601)));
        $this->assertEquals("2 hours ago", $blog->createdAgo($this->getDateTime(-7200)));

        // Cannot create time in the future
        $this->setExpectedException('\InvalidArgumentException');
        $blog->createdAgo($this->getDateTime(60));
    }

    protected function getDateTime($delta)

    {
        return new \DateTime(date("Y-m-d H:i:s", time()+$delta));
    }
}
