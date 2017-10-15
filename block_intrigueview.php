<?php
class block_intrigueview extends block_base {


  public function init() {
    $this->title = get_string('intrigueview', 'block_intrigueview');
  }

  public function get_content() {
    if ($this->content !== null) {
      return $this->content;
    }
    $this->content = new stdClass;
    $this->content->text = 'Make sure your teacher sets a Feed URL!';
    $this->content->footer = '<a href="#">The Link to the display site</a>';
  }

  public function specialization() {
    if (empty($this->config->title)) {
      $this->title = get_string('defaultTitle', 'block_intrigueview');
    } else {
      $this->title = $this->config->title;
    }

    // Check if a feed is available
    if ($feed = simplexml_load_file($this->config->url)) {
      $this->content->text = "<script src='../blocks/intrigueview/amd/js/display.js'></script>"; // Empty the container to make room for the display
              // MAKE CONFIGURABLE LATER NUMBER OF DISPLAYS
      for ($c = 0; $c < 5; $c++) { // Display 5 times to display 5 feed tiles
        // Edit the Content to display the Feed
        $newTile = ""; // Reset the tile div
        $newTile .= "<div class='entry-tile'>";
        // Have the entry link clickable wherever
        $newTile .= '<a href="' . $feed->channel->entry[$c]->link . '" onclick="return openInNewTab(\'' . $feed->channel->entry[$c]->link . '\')" class="hover-detect"><span class="entry-url"></span></a>';
        // Add an image only if one exists
        if (isset($feed->channel->entry[$c]->image)) {
          $newTile .= "<div class='image-space'><img class='fix-image-sizing' src='" . $feed->channel->entry[$c]->image . "'></div>";
        } else {
          $newTile .= "<div class='image-space'><img class='fix-image-sizing' src='../blocks/intrigueview/assets/tileFill.png'></div>";
        }
        $newTile .= "<div class='text-intview-content entry-heading'>" . $feed->channel->entry[$c]->title . "</div>";
        $newTile .= "</div>";
        $this->content->text .= $newTile;
        /* FORMAT TEMPLATE
        <div class='entry-tile' width='4rem'>
          <div class='image-space'><img class='fix-image-sizing' src='https://iso.500px.com/wp-content/uploads/2017/05/stock-photo-144694167-1500x1000.jpg'></div>
          <div class='text-intview-content'>Russia is coming for you, and heres how theyre gonna do it lmao</div>
        </div>
        */
      }
      // Set the footer link to view the remaining site
      if (strpos($this->config->site, 'http') == false) {
        $tempSite = $this->config->site;
        $this->config->site = "http://" . $tempSite;
      }
      $this->content->footer = '<a href="' . $this->config->site . '">View the Site!</a>';
    }

  }

}

 ?>
